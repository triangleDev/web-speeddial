<?php

function print_categories($categories)
{
    if ( ! $categories)
        return;
    echo '<ol>';
    foreach($categories as $key => $item)
    {
        echo '<li data-id="'.$key.'">';
        echo HTML::anchor('#',$item['name'],array('data-id' => $key));
        if ( $item['childs'])
            print_categories($item['childs']);
        echo '</li>';
    }
    echo '</ol>';
}

function build_childs(&$categories, $parent)
{
    $reslut = array();
    foreach($categories as $key => $item)
    {
         if ( (int)$item['parent_id'] == $parent)
         {
             unset($categories[$key]);
             $id = $item['id'];
             $reslut[$id] = array(
                 'name' => $item['name'],
                 'childs' =>  build_childs($categories, $id)
             );
         }
    }
    return $reslut;
}

function build_cat_tree($categories)
{
    return array(
        NULL => array(
            'name' => __('root'),
            'childs' => build_childs($categories, NULL),
        ),
    );
}
$current_category = NULL;
$current_user = Auth::instance()->current_user();
$categories = Model_Categories::find_all(array(
    'user_id' => $current_user->id,
));

$cat_struct = build_cat_tree($categories->records);

$sites = Model_Sites::find_all( array(
    'user_id' => $current_user->id,
    'category' => (int)$current_category,
));
$sites_  = array();
foreach($sites->records as $item)
{
    $sites_[$item['id']] = $item;
}

$screenshorts = Model_Screenshorts::find_all(array(
    'url_id' => Arr::pluck($sites->records, 'id' ),
));
?>
<div class="alert alert-block">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Summary</h4>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4">
                <?php
                 echo Text::auto_p(__('categories').':&nbsp;'. $categories->total_count);
                 echo Text::auto_p(__('sites').':&nbsp;'. $sites->total_count);
                ?>
            </div>
            <div >
                generated screenshorts
                <?php
                    $max = $screenshorts->total_count;
                    $success = 0;
                    $screenshorts_ = array();
                    foreach($screenshorts->records as $item)
                    {
                        $status = Arr::get($item, 'status', Model_Screenshorts::STATUS_FAIL);
                        if ($status == Model_Screenshorts::STATUS_GENERATED)
                            ++$success;

                        $site_id = Arr::get($item, 'url_id');
                        $screenshorts_[$site_id][] = $item;
                    }
                    unset($screenshorts);
                    if ( ! $max)
                    {
                        $progress = $max;
                    }
                    else
                    {
                        $progress = (100 / $max) *$success;
                        $progress = round($progress, 0);
                    }

                    $progress_info_class =  'progress-success';
                    if ( $progress < 50)
                        $progress_info_class = 'progress-danger';
                    if ( $progress >= 50 && $progress < 100)
                        $progress_info_class = 'progress-warning';
                ?>
                <div class="progress <?php echo $progress_info_class;?> progress-striped active">
                    <div class="bar" style="width: <?php echo $progress;?>%;"></div>
                    <div class="progress-info"> <?php echo $progress;?>%</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="adding-form">

</div>
<div class="panel-content">
    <div class="sidebar">
        <div class="header">
            <?php
                echo __('categories');
            ?> <a class="close" title="hide sidebar">&times;</a>
            <?php
                echo '<ul class="cat_tree">';
                    foreach($cat_struct as $key => $item)
                    {
                        echo '<li data-id="'.$key.'">';
                            echo HTML::anchor('#',$item['name'],array('data-id' => $key));
                            if ( $item['childs'])
                                print_categories($item['childs']);
                        echo '</li>';
                    }
                echo '</ul>';
            ?>
        </div>
        <!--Sidebar content-->
    </div>
    <div class="body-content">
        <ul class="thumbnails">
            <?php
                foreach($sites_ as $item)
                {
                    echo '<li class="span3">';
                    $img = Arr::get($screenshorts_[$item['id']],0);
                    $status = (int)$img['status'];
                    $img_url = URL::base(TRUE,TRUE).'screenshorts/'.$img['file'];
                    if ( $status != Model_Screenshorts::STATUS_GENERATED)
                    {
                        $width = $img['width'];
                        $height= $img['height'];
                        $text = __('in_queue');
                        if ($status == Model_Screenshorts::STATUS_IN_PROGRESS)
                            $text = __('in_progress');
                        else if ( $status == Model_Screenshorts::STATUS_FAIL)
                            $text = __('fialed');
                        $img_url = 'http://placehold.it/'.$width.'x'.$height.'&text=' . $text;
                    }
                    $img_tag = '<img src="'.$img_url.'" alt="">';
                        echo HTML::anchor($item['link'],$img_tag, array(
                            'class' => 'thumbnail','target' => '_blank'
                        ));
                    echo '</li>';
                }
            ?>
        </ul>
        <!--Body content-->
    </div>
</div>