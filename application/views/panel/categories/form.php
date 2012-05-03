<?php
echo Form::open('panel/categories/update',array(
  'class' => 'well',
));
?>
    <label><?php echo __('category_name');?></label>
    <input type="text" class="span3" name="cat_name" placeholder="<?php echo __('type_your_category_name_here');?>">
    <div class="control-group">
            <label class="control-label" for="selectError"><?php echo __('select_a_parent_category');?></label>
            <div class="controls">
            <?php 
		$items = array(
		  NULL => __('no_parent'),
		); 
		echo Form::select('cat_parent',$items, NULL, array('id' => 'selectError'));
            ?>
            </div>
          </div>
      
    <button type="submit" class="btn btn-primary"><?php echo __('Submit');?></button>
    <button type="button" class="btn cancel-btn"><?php echo __('Cancel');?></button>
</form>