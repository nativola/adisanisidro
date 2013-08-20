<div class="sliderclass">
<div id="imageslider" class="container">
                   <div class="flexslider loading">
                       <ul class="slides">
                       <?php 
                       global $smof_data; $height = $smof_data['mobile_slider_size']; if($height != '') $slideheight = $height; else $slideheight = 250; 
              ?>
                           <?php global $smof_data; $slides = $smof_data['home_mobile_slider'];
                               foreach ($slides as $slide) : 
                               $image = aq_resize($slide['url'], 480, $slideheight, true);
                 ?>
                                  <li> 
                                  <?php if($slide['link'] != '') echo '<a href="'.$slide['link'].'">'; ?>
                                  <img src="<?php echo $image; ?>" alt="<?php echo $slide['description']?>" title="<?php echo $slide['title'] ?>" />
                                  <?php if($slide['link'] != '') echo '</a>'; ?>
                                  </li>
                               <?php endforeach; ?>
                       </ul>
              </div> <!--Flex Slides-->
              </div><!--Container-->
              </div><!--feat-->
               <?php  global $smof_data; 
          $transtype = $smof_data['mobile_trans_type']; if ($transtype == '') $transtype = 'slide';
          $transtime = $smof_data['mobile_slider_transtime']; if ($transtime == '') $transtime = '300'; 
          $autoplay = $smof_data['mobile_slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
          $pausetime = $smof_data['mobile_slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
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