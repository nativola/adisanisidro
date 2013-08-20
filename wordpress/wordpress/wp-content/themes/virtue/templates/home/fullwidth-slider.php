<div class="sliderclass">
  <?php global $smof_data; $height = $smof_data['slider_size']; if($height != '') $slideheight = $height; else $slideheight = 400; 
                if($smof_data['boxed_layout'] == 'boxed') $slidewidth = 1210; else $slidewidth = 2000;
                $captions = $smof_data['slider_captions'];
                $slides = $smof_data['home_slider'];
                ?>
    <div class="flexslider loading">
        <ul class="slides">
            <?php foreach ($slides as $slide) : 
                    $image = aq_resize($slide['url'], $slidewidth, $slideheight, true); ?>
                      <li> 
                        <?php if($slide['link'] != '') echo '<a href="'.$slide['link'].'">'; ?>
                          <img src="<?php echo $image; ?>" alt="<?php echo $slide['description']?>" title="<?php echo $slide['title'] ?>" />
                              <?php if ($captions == 'yes') { ?> 
                                <div class="flex-caption">
                                <?php if ($slide['title'] != '') echo '<div class="captiontitle">'.$slide['title'].'</div>'; ?>
                                <?php if ($slide['description'] != '') echo '<div><div class="captiontext"><p>'.$slide['description'].'</p></div></div>';?>
                                </div> 
                              <?php } ?>
                        <?php if($slide['link'] != '') echo '</a>'; ?>
                      </li>
                  <?php endforeach; ?>
        </ul>
      </div> <!--Flex Slides-->
</div><!--sliderclass-->

      <?php  global $smof_data; 
          $transtype = $smof_data['trans_type']; if ($transtype == '') $transtype = 'slide';
          $transtime = $smof_data['slider_transtime']; if ($transtime == '') $transtime = '300'; 
          $autoplay = $smof_data['slider_autoplay']; if ($autoplay == '') $autoplay = 'true'; 
          $pausetime = $smof_data['slider_pausetime']; if ($pausetime == '') $pausetime = '7000'; 
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