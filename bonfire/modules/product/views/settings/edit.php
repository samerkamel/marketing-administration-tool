
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($product) ) {
	$product = (array)$product;
}
$id = isset($product['id']) ? "/".$product['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'product_name'); ?> <span class="required">*</span>
        <input id="product_name" type="text" name="product_name" maxlength="255" value="<?php echo set_value('product_name', isset($product['product_name']) ? $product['product_name'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit Product" /> or <?php echo anchor(SITE_AREA .'/settings/product', lang('product_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/product/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('product_delete_confirm'); ?>')"><?php echo lang('product_delete_record'); ?></a>
		
		<h3><?php echo lang('product_delete_record'); ?></h3>
		
		<p><?php echo lang('product_edit_text'); ?></p>
	</div>
