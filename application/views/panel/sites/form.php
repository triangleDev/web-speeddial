<?php
$general = Arr::get($errors, 'general');

if ( $general)
{
    echo '<div class="alert alert-error">
        <a class="close" data-dismiss="alert" href="#">×</a>
                <h4 class="alert-heading">'.__('warning').'!</h4>
                '.$general.'
                </div>';
}

$form = new Pretty_Form(array(
    'errors' => $errors,
    'template' => 'twitter_bootstrap',
));

echo $form->open( Url::site('panel/sites/update'), array('class' => 'well'));
echo $form->legend(__('add_site'));
echo $form->input(array(
    'name' => 'url_title',
    'label' => __('website_title'),
    'attr' => array(
        'class' => 'span3',
        'placeholder' => __('type_website_title_here')
    ),
    'info' =>  __('live_it_blank_and_it_will_automaticly_fill_whith_our_screenshort_grabber')
));
echo $form->input(array(
    'name' => 'url',
    'label' => __('website_url'),
    'attr' => array(
        'class' => 'span8',
        'placeholder' => __('type_website_url_here')
    ),
    'info' =>  __('must_be_valid_url')
));
$categories = Model_Categories::find_all(array(
    'user_id' => Auth::instance()->current_user()->id,
))->records;

$categories = Arr::unshift($categories, NULL, __('no_parent'));
echo $form->select(array(
    'name' => 'parent_cat',
    'label' => __('select_a_parent_category'),
    'attr' => array(
        'class' => 'span3',
    ),
    'buttons' => $categories,
));
echo $form->form_action(array(
    'template' => 'buttons_only',
    'buttons' => array(
        array('submit',__('Submit'), array( 'class' => 'btn btn-primary', 'type'=>"submit")),
        array('button',__('Cancel'), array( 'class' => 'btn cancel-btn')),
    )
));
echo $form->hidden('site_id');
$form->close();

