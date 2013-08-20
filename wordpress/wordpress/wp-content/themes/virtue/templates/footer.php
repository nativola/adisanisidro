<footer id="containerfooter" class="content-info footerclass" role="contentinfo">
  <div class="container">
  	<div class="row">
  		<?php global $smof_data; $footer_layout = $smof_data['footer_layout'];
  			if ($footer_layout == "fourc") {
  				if (is_active_sidebar('footer_1') ) { ?> 
					<div class="span3">
					<?php dynamic_sidebar("Footer Column 1"); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_2') ) { ?> 
					<div class="span3">
					<?php dynamic_sidebar("Footer Column 2"); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_3') ) { ?> 
					<div class="span3">
					<?php dynamic_sidebar("Footer Column 3"); ?>
					</div> 
	            <?php }; ?>
				<?php if (is_active_sidebar('footer_4') ) { ?> 
					<div class="span3">
					<?php dynamic_sidebar("Footer Column 4"); ?>
					</div> 
		        <?php }; ?>
		    <?php } else if($footer_layout == "threec") {
		    	if (is_active_sidebar('footer_third_1') ) { ?> 
					<div class="span4">
					<?php dynamic_sidebar("Footer Column 1"); ?>
					</div> 
            	<?php }; ?>
				<?php if (is_active_sidebar('footer_third_2') ) { ?> 
					<div class="span4">
					<?php dynamic_sidebar("Footer Column 2"); ?>
					</div> 
		        <?php }; ?>
		        <?php if (is_active_sidebar('footer_third_3') ) { ?> 
					<div class="span4">
					<?php dynamic_sidebar("Footer Column 3"); ?>
					</div> 
	            <?php }; ?>
			<?php } else {
					if (is_active_sidebar('footer_double_1') ) { ?>
					<div class="span6">
					<?php dynamic_sidebar("Footer Column 1"); ?> 
					</div> 
		            <?php }; ?>
		        <?php if (is_active_sidebar('footer_double_2') ) { ?>
					<div class="span6">
					<?php dynamic_sidebar("Footer Column 2"); ?> 
					</div> 
		            <?php }; ?>
		        <?php } ?>
        </div>
        <div class="footercredits clearfix">
    		
    		<?php if (has_nav_menu('footer_navigation')) :
        	?><div class="footernav clearfix"><?php 
              wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'footermenu'));
            ?></div><?php
        	endif;?>
        	<p><?php global $smof_data; $footertext = $smof_data['footer_text']; echo do_shortcode($footertext); ?></p>
    	</div>

  </div>

</footer>

<?php wp_footer(); ?>
