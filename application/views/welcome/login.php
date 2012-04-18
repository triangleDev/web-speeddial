<form class="form-horizontal">
    <fieldset>
        <legend>Log in </legend>
        <div class="control-group">
            <label class="control-label" for="input01">login</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">@</span><input class="span2" id="prependedInput" size="16" type="text">
                </div>
                <p class="help-block">valid email address</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input02">password</label>
            <div class="controls">
                <input type="password" class="input-xlarge" id="input02">
                <p class="help-block">forgot password restore</p>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo __('login');?></button>
        </div>
    </fieldset>
</form>