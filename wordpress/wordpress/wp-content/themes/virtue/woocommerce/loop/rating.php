<?php
/**
 * Loop Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
	return;
?>
<?php global $smof_data; if ($smof_data['shop_rating'] == '1') { ?> 
	<?php if ( $rating_html = $product->get_rating_html() ) { ?>
		<?php echo $rating_html; ?>
	<?php } else { echo "<span class='notrated'>not rated</span>"; ?>
	<?php } ?>
<?php } ?>