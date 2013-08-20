<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php global $smof_data; if($smof_data['shop_layout'] == "sidebar") {
		if (is_shop() || is_product_category() || is_product_tag()) $columns = "s-threecolumn"; else $columns = "fourcolumn";
	} else {$columns = "fourcolumn";} ?>
<div id="product_wrapper" class="products <?php echo $columns; ?> clearfix">