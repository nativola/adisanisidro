<?php
/*
Template Name: Feature
*/
?>

	<?php global $post; $headoption = get_post_meta( $post->ID, '_kad_page_head', true ); 
				if ($headoption == 'flex') {
					get_template_part('templates/flex', 'slider');
				}
				else if ($headoption == 'video') {
					?>
					 <section class="postfeat container">
				          <div class="videofit">
				              <?php global $post; $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo $video; ?>
				          </div>
				        </section>
					<?php 
				}
				else if ($headoption == 'image') {
                global $post; $height = get_post_meta( $post->ID, '_kad_posthead_height', true ); if ($height != '') $slideheight = $height; else $slideheight = 350;             
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                    $image = aq_resize( $img_url, 1170, $slideheight, true ); //resize & crop the image
                    ?>
                    <?php if($image) : ?>
                      <div class="imghoverclass"><a href="<?php echo $img_url ?>" rel="lightbox[pp_gal]" class="lightboxhover"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a></div>
                    <?php endif; ?>
                    <?php
				}
		?>

	<div id="pageheader" class="titleclass">
		<div class="container">
			<?php get_template_part('templates/page', 'header'); ?>
		</div><!--container-->
	</div><!--titleclass-->
	
    <div id="content" class="container">
   		<div class="row">
     		<div class="main <?php echo kadence_main_class(); ?>" role="main">
				<?php get_template_part('templates/content', 'page'); ?>
			</div><!-- /.main -->