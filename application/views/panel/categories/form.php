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

echo $form->open( Url::site('panel/categories/update'), array('class' => 'well'));
echo $form->legend(__('add_category'));

echo $form->input(array(
    'name' => 'cat_name',
    'label' => __('category_name'),
    'attr' => array(
        'class' => 'span8',
        'placeholder' => __('type_your_category_name_here')
    ),
    'info' =>  __('must_be_valid_url')
));

echo $form->select(array(
    'name' => 'parent_cat',
    'label' => __('select_a_parent_category'),
    'attr' => array(
        'class' => 'span3',
    ),
    'buttons' => Model_Categories::user_collection(Auth::instance()->current_user()->id),
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
