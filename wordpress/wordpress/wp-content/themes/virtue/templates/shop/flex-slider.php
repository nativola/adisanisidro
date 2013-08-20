
  <?php global $smof_data; 
                if( isset( $smof_data['shop_slider_size']))  { $slideheight =  $smof_data['shop_slider_size']; } else { $slideheight = 400; }
                if( isset( $smof_data[ 'shop_layout' ] ) && $smof_data[ 'shop_layout' ] == "sidebar" ) {$cat_width = 770;} else {$cat_width = 1170;}
                $captions = $smof_data['shop_slider_captions'];
                $slides = $smof_data['shop_slider_images'];
                ?>
    <div class="flexslider loading" >
        <ul class="slides">
            <?php foreach ($slides as $slide) : 
                    $image = aq_resize($slide['url'], $cat_width, $slideheight, true); ?>
                      <li> 
                        <?php if($slide['link'] != '') echo '<a href="'.$slide['link'].'">'; ?>
                          <img src="<?php echo $image; ?>" alt="<?php echo $slide['description']?>" title="<?php echo $slide['title'] ?>" />
                              <?php if ($captions == '1') { ?> 
                                <div class="flex-caption">
              								  <?php if ($slide['title'] != '') echo '<div class="captiontitle headerfont">'.$slide['title'].'</div>'; ?>
              								  <?php if ($slide['description'] != '') echo '<div><div class="captiontext headerfont"><p>'.$slide['description'].'</p></div></div>';?>
                                </div> 
                              <?php } ?>
                        <?php if($slide['link'] != '') echo '</a>'; ?>
                      </li>
                  <?php endforeach; ?>
        </ul>
      </div> <!--Flex Slides-->


      <?php  global $smof_data; 
          $transtype = $smof_data['shop_trans_type']; if ($transtype == '') $transtype = 'slide';
          $transtime = $smof_data['shop_slider_transtime']; if ($transtime == '') $transtime = '300'; 
          $autoplay = $smof_data['shop_slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
          $pausetime = $smof_data['shop_slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
      ?>
      <script type="text/javascript">
            jQuery(window).load(function () {
                jQuery('.flexslider').flexslider({
                    animation: "<?php echo $transtype ?>",
                    animationSpeed: <?php echo $transtime ?>,
                    slideshow: <?php echo $autoplay ?>,
                    slideshowSpeed: <?php echo $pausetime ?>,

                    before: function(slider) {
                      slider.removeClass('loading');
                    }  
                  });
                });
      </script>