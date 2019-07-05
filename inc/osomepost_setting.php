<?php 
/*
*
* SWE Osome Slider Setting
*
*/ 
if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
 if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'crtheme' ); ?></strong></p></div>
<?php endif; ?>
<div class="wrap swe_osome_wrap">
	<h2 class="osome_admin_heading">SWE Osome Setting</h2>
	<h3  style="color:black;text-align:center;">Change the setting as per your requirement</h3>
	<form method="post" action="options.php">
	<table id="osome_setting_form_table">
	<?php settings_fields( 'swe_osm_options' ); ?>
	<?php $options = get_option( 'swe_osm_slider_options' ); 
		  $options = get_option('swe_osm_slider_options');
	?>
	<tr>
		<td><label>Show Title: </label></td>
		<td>
			<select name="swe_osm_slider_options[slider_post_title]">
				<option value="true" <?php echo $options['slider_post_title']=="true"?"selected":""; ?>>Yes</option>
				<option value="false" <?php echo $options['slider_post_title']=="false"?"selected":""; ?>>No</option>
			</select>
		</td>	
	</tr>
	<tr>
		<td><label>Show Excerpt: </label></td>
		<td>
			<select name="swe_osm_slider_options[slider_post_excerpt]">
				<option value="true" <?php echo $options['slider_post_excerpt']=="true"?"selected":""; ?>>Yes</option>
				<option value="false" <?php echo $options['slider_post_excerpt']=="false"?"selected":""; ?>>No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Loop: </label></td>
		<td>
			<select name="swe_osm_slider_options[slider_loop]">
				<option value="true" <?php echo $options['slider_loop']=="true"?"selected":""; ?>>Yes</option>
				<option value="false" <?php echo $options['slider_loop']=="false"?"selected":""; ?>>No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Margin: </label></td>
		<td><input type="number" name="swe_osm_slider_options[slider_margin]" value="<?php echo ($options['slider_margin']!=""? $options['slider_margin']:"10"); ?>"></td>
	</tr>
	<tr>
		<td><label>Navigation: </td>
		<td><select name="swe_osm_slider_options[slider_nav]">
				<option value="true" <?php echo $options['slider_nav']=="true"?"selected":""; ?>>Yes</option>
				<option value="false" <?php echo $options['slider_nav']=="false"?"selected":""; ?>>No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Autoplay: </td>
		<td><select name="swe_osm_slider_options[slider_autoplay]">
				<option value="true"  <?php echo $options['slider_autoplay']=="true"?"selected":""; ?>>Yes</option>
				<option value="false"  <?php echo $options['slider_autoplay']=="false"?"selected":""; ?>>No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>Item on Mobile: </label></td>
		<td><input type="number" name="swe_osm_slider_options[slider_mobile_item_no]" value="<?php echo ($options['slider_mobile_item_no']!=""?$options['slider_mobile_item_no']:"1"); ?>"></td>
	</tr>
	<tr>
		<td><label>Item on Tablet/iPad: </label></td>
		<td><input type="number" name="swe_osm_slider_options[slider_tablet_item_no]" value="<?php echo ($options['slider_tablet_item_no']!=""?$options['slider_tablet_item_no']:"3"); ?>"></td>
	</tr>
	<tr>
		<td><label>Item on Desktop/Laptop: </label></td>
		<td><input type="number" name="swe_osm_slider_options[slider_desktop_item_no]" value="<?php echo ($options['slider_desktop_item_no']!=""?$options['slider_desktop_item_no']:"3"); ?>"></td>
	</tr>
	<tr>
		<td><input type="hidden" name="osm_nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>" /></td>
		<td><?php submit_button(); ?></td>
	</tr>
	</form>
</div>