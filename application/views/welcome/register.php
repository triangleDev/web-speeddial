<?php
$form = new Pretty_Form(array(
    'errors' => $errors,
    'template' => 'twitter_bootstrap',
));
echo $form->open( Url::site('welcome/register'), array('class' => 'form-horizontal'));
echo $form->legend(__('legend'));
echo $form->input(array(
    'name' => 'user_name',
    'label' => 'login',
    'attr' => array( ),
    'info' => __('your_login')
));

echo $form->input(array(
    'name' => 'email',
    'template' => 'input_for_mail',
    'label' => __('email_address'),
    'attr' => array( ),
    'info' => __('valid_email_adrress')
));

echo $form->form_action(array(
    'buttons' => array(
        array('submit', __('register'), array( 'class' => 'btn btn-primary', 'type' => 'submit'))
    )
));
echo $form->close();
return;
?>
<form class="form-horizontal" method="post" action"<?php echo Url::site('welcome/register');?>">
    <fieldset>
        <legend>Legend text</legend>
        <div class="control-group">
            <label class="control-label" for="input01">login</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="input01" name="user_name">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>
        <div class="control-group error">
            <label class="control-label" for="input01">login</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="input01" name="email">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Checkbox</label>
            <div class="controls">
                <label class="checkbox">
                    <input type="checkbox" name="terms_of_use" id="optionsCheckbox" value="option1">
                    Option one is this and that—be sure to include why it's great
                </label>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo __('register');?></button>
        </div>
    </fieldset>
</form>