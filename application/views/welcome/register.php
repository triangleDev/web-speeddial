<form class="form-horizontal">
    <fieldset>
        <legend>Legend text</legend>
        <div class="control-group">
            <label class="control-label" for="input01">login</label>
            <div class="controls">
                <input type="text" class="input-xlarge" id="input01">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Checkbox</label>
            <div class="controls">
                <label class="checkbox">
                    <input type="checkbox" id="optionsCheckbox" value="option1">
                    Option one is this and that—be sure to include why it's great
                </label>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo __('register');?></button>
        </div>
    </fieldset>
</form>