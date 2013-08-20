<header class="banner headerclass" role="banner">
<?php if (kadence_display_topbar()) : ?>
  <section id="topbar" class="topclass">
    <div class="container">
      <div class="row">
        <div class="span8">
          <div class="topbarmenu clearfix">
          <?php if (has_nav_menu('topbar_navigation')) :
              wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => ''));
            endif;?>
            <?php global $smof_data; if ($smof_data['show_cartcount'] == '1') { 
            if (class_exists('woocommerce')) {
              global $woocommerce; ?>
                <ul>
                  <li>
                  <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woocommerce'); ?>">
                      <i class="icon-basket"></i> <?php _e('Your Cart', 'woocommerce');?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
                  </a>
                </li>
              </ul>
            <?php } }?>
          </div>
        </div><!-- close span8 -->
        <div class="span4">
          <div id="topbar-search">
          <?php get_search_form(); ?>
        </div><!-- Topbarsearch -->
        </div> <!-- close span4-->
      </div> <!-- Close Row -->
    </div> <!-- Close Container -->
  </section>
<?php endif; ?>

  <div class="container">
    <div class="row">
          <div class="span4 clearfix">
            <div id="logo" class="logocase">
              <a class="brand logofont" href="<?php echo home_url(); ?>/">
                      <?php global $smof_data; if ($smof_data['logo_upload']) { ?> <div id="thelogo"></div> <?php } else { bloginfo('name'); } ?>
              </a>
              <?php global $smof_data; if ($smof_data['logo_below_text']) { ?> <p class="belowlogo-text"><?php echo $smof_data['logo_below_text']; ?></p> <?php }?>
           </div> <!-- Close #logo -->
       </div><!-- close span5 -->

       <div class="span8">
         <nav id="nav-main" class="clearfix" role="navigation">
          <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu')); 
            endif;
            if (has_nav_menu('mobile_navigation')) :
            wp_nav_menu( array('theme_location' => 'mobile_navigation', 'items_wrap' => '<select id="%1$s" class="%2$s">%3$s</select>', 'menu_class' => 'navselect', 'walker' => new Virtue_Dropdown_Nav() ));
            ?> <div class="mobilenav-button"><i class="icon-menu"></i><span class="headerfont"><?php _e('menu', 'virtue');?></span></div> <?php
           endif;
          ?>    
          </nav>
        </div> <!-- Close span7 -->
    </div> <!-- Close Row -->
  </div> <!-- Close Container -->
  <?php
            if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass">
    <div class="container">
     <nav id="nav-second" class="clearfix" role="navigation">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section>
    <?php endif; ?> 
</header>