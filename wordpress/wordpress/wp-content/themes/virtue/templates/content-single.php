  <?php $headcontent = get_post_meta( $post->ID, '_kad_blog_head', true );?>
<div id="content" class="container">
    <div class="row single-article">
      <div class="main <?php echo kadence_main_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class(); ?>>
          <?php $headcontent = get_post_meta( $post->ID, '_kad_blog_head', true );
            if ($headcontent == 'flex') { ?>
              <section class="postfeat">
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
                  $image = aq_resize($attachment_url, 770, $slideheight, true);
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
        <?php } else if ($headcontent == 'video') { ?>
        <section class="postfeat">
          <div class="videofit">
              <?php global $post; $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo $video; ?>
          </div>
        </section>
        <?php } else if ($headcontent == 'image') { ?>
                <?php global $post; $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); if ($height != '') $slideheight = $height; else $slideheight = 350;             
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                    $image = aq_resize( $img_url, 770, $slideheight, true ); //resize & crop the image
                    ?>
                    <?php if($image) : ?>
                      <div class="imghoverclass"><a href="<?php echo $img_url ?>" rel="lightbox[pp_gal]" class="lightboxhover"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a></div>
                    <?php endif; ?>
        <?php } ?>
    <div class="postmeta">
                                  <div class="postdate bg-lightgray headerfont">
                                    <span class="postday"><?php echo get_the_date('j'); ?></span>
                                    <?php echo get_the_date('M Y');?>
                                  </div>
                                    
    </div>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <div class="subhead">
                                  <span class="postauthortop">
                                    <i class="icon-user"></i> by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo get_the_author() ?></a>
                                  </span>
                                  <?php $post_category = get_the_category($post->ID); if ( $post_category==true ) { ?> | <span class="postedintop"><i class="icon-folder-open"></i> <?php _e('posted in:', 'virtue');?> <?php the_category(', ') ?></span> <?php }?>
                                  |
                                <span class="postcommentscount">
                                  <i class="icon-bubbles"></i> <?php comments_number( '0', '1', '%' ); ?>
                                </span>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer class="single-footer">
      <?php $tags = get_the_tags(); if ($tags) { ?> <span class="posttags"><i class="icon-tag"></i> <?php the_tags('', ', ', ''); ?> </span><?php } ?>
      
      <?php global $post; if(get_post_meta( $post->ID, '_kad_blog_author', true ) == 'yes') { virtue_author_box(); } ?>
      <?php global $post; $blog_carousel_recent = get_post_meta( $post->ID, '_kad_blog_carousel_similar', true ); if ($blog_carousel_recent == 'similar') { get_template_part('templates/similarblog', 'carousel'); } else if($blog_carousel_recent == 'recent') {get_template_part('templates/recentblog', 'carousel');} ?>

      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'virtue'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
</div>

