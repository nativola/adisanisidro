<section class="pagefeat container">
                <div class="flexslider">
                <ul class="slides">
                  <?php $args = array(
                      'order'          => 'ASC',
                      'post_type'      => 'attachment',
                      'post_parent'    => $post->ID,
                      'post_mime_type' => 'image',
                      'post_status'    => null,
                      'orderby'    => 'menu_order',
                      'numberposts'    => -1,);
                    $attachments = get_posts($args);
                    global $post; $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); if ($height != '') $slideheight = $height; else $slideheight = 350; 
                if ($attachments) {
                foreach ($attachments as $attachment) {
                  $attachment_url = wp_get_attachment_url($attachment->ID , 'full');
                  $image = aq_resize($attachment_url, 1170, $slideheight, true);
                  echo '<li><img src="'.$image.'"/></li>';
                } 
              } ?>                            
            </ul>
          </div> <!--Flex Slides-->
          <script type="text/javascript">
            jQuery(window).load(function () {
                jQuery('.flexslider').flexslider({
                    animation: "fade",
                    animationSpeed: 400,
                    slideshow: true,
                    slideshowSpeed: 7000,

                    before: function(slider) {
                      slider.removeClass('loading');
                    }  
                  });
                });
      </script>
        </section>