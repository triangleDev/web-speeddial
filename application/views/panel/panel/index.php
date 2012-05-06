<?php

function print_categories($categories)
{
    if ( ! $categories)
        return;
    echo '<ol>';
    foreach($categories as $key => $item)
    {
        echo '<li data-id="'.$key.'">';
        echo $item['name'];
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
$current_user = Auth::instance()->current_user();
$categories = Model_Categories::find_all(array(
    'user_id' => $current_user->id,
));

$cat_struct = build_cat_tree($categories->records);

$sites = Model_Sites::find_all( array(
    'user_id' => $current_user->id,
));
$sites_ids = Arr::pluck($sites->records, 'id' );
$screenshorts = Model_Screenshorts::find_all(array(
    'url_id' => $sites_ids,
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
                    $progress = (100 / $max) *$success;
                    $progress = round($progress, 0);
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
                echo '<ul>';
                    foreach($cat_struct as $key => $item)
                    {
                        echo '<li data-id="'.$key.'">';
                            echo $item['name'];
                            if ( $item['childs'])
                                print_categories($item['childs']);
                        echo '</li>';
                    }
                echo '</ul>';
            ?>
        </div>
        <!--Sidebar content-->
    </div>
    <div class="body-content">d vvv
        <!--Body content-->
    </div>
</div>