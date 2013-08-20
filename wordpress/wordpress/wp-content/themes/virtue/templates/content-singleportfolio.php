
	<div id="pageheader" class="titleclass">
		<div class="container">
			<div class="page-header">
				<div class="portfolionav clearfix">
   			<?php previous_post_link('%link', '<i class="icon-arrow-left"></i>'); ?> 
   			<?php global $smof_data; if( isset($smof_data['portfolio_link']) && $smof_data['portfolio_link'] != "Select a page:"){ ?>
   			<a href="<?php echo get_home_url().'/'.$smof_data["portfolio_link"].'/'; ?>">
				<?php } else {?> 
				<a href="../">
				<?php } ?>
   				<i class="icon-grid"></i></a> 
   			<?php next_post_link('%link', '<i class="icon-arrow-right"></i>'); ?>
   			</div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
		</div><!--container-->
	</div><!--titleclass-->
<div id="content" class="container">
    <div class="row">
      <div class="main <?php echo kadence_main_class(); ?> portfolio-single" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <?php global $post; $layout = get_post_meta( $post->ID, '_kad_ppost_layout', true ); 
						$ppost_type = get_post_meta( $post->ID, '_kad_ppost_type', true );
						 $imgheight = get_post_meta( $post->ID, '_kad_posthead_height', true );
		if($layout == 'above')  {
				$imgclass = 'span12';
				$textclass = 'pcfull clearfix';
				$entryclass = 'span8';
				$valueclass = 'span4';
				$slidewidth = 1170;
			}else  {
				$imgclass = 'span7';
				$textclass = 'span5 pcside';
				$entryclass = '';
				$valueclass = '';
				$slidewidth = 670;
			 	}
		if ($imgheight != '') {
			$slideheight = $imgheight;
		} else {
			$slideheight = 450;
		} 
		 ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="postclass">
      	<div class="row">
      		<div class="<?php echo $imgclass; ?>">
				<?php if ($ppost_type == 'flex') { ?>
					<div class="flexslider loading">
                       <ul class="slides">
                          <?php 
						  $args = array(
								'order'          => 'ASC',
								'post_type'      => 'attachment',
								'post_parent'    => $post->ID,
								'post_mime_type' => 'image',
								'post_status'    => null,
								'orderby'		 => 'menu_order',
								'numberposts'    => -1,
							);
							$attachments = get_posts($args);
							if ($attachments) {
								foreach ($attachments as $attachment) {
									$attachment_url = wp_get_attachment_url($attachment->ID , 'full');
									$image = aq_resize($attachment_url, $slidewidth, $slideheight, true);
									echo '<li><img src="'.$image.'"/></li>';
								}	
							}
							
							?>                            
					</ul>
					<script type="text/javascript">
			            jQuery(window).load(function () {
			                jQuery('.flexslider').flexslider({
			                    animation: "fade",
			                    animationSpeed: 500,
			                    slideshow: true,
			                    slideshowSpeed: 7000,

			                    before: function(slider) {
			                      slider.removeClass('loading');
			                    }  
			                  });
			                });
			      </script>
              </div> <!--Flex Slides-->
				<?php }
				else if ($ppost_type == 'rev') {
					global $post; $revslider = get_post_meta( $post->ID, '_kad_post_rev', true ); putRevSlider( $revslider );
				}
				else if ($ppost_type == 'video') { ?>
					<div class="videofit">
                  <?php global $post; $video = get_post_meta( $post->ID, '_kad_post_video', true ); echo $video; ?>
                  </div>
				<?php } else {					
							$post_id = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $post_id);
							$image = aq_resize( $img_url, $slidewidth, $slideheight, true ); //resize & crop the image
							?>
                                <?php if($image) : ?>
                                    <div class="imghoverclass">
                                    	<a href="<?php echo $img_url ?>" rel="lightbox[pp_gal]" class="lightboxhover">
                                    		<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
                                    	</a>
                                    </div>
                                <?php endif; ?>
				<?php } ?>
        </div><!--imgclass -->
  		<div class="<?php echo $textclass; ?>">
		    <div class="entry-content <?php echo $entryclass; ?>">
		      <?php the_content(); ?>
		  </div>
	    		<div class="<?php echo $valueclass; ?>">
	    			<div class="pcbelow">
				    <ul class="portfolio-content disc">
				    	<?php global $post; $project_v1t = get_post_meta( $post->ID, '_kad_project_val01_title', true );
				    						$project_v1d = get_post_meta( $post->ID, '_kad_project_val01_description', true );
				    						$project_v2t = get_post_meta( $post->ID, '_kad_project_val02_title', true );
				    						$project_v2d = get_post_meta( $post->ID, '_kad_project_val02_description', true );
				    						$project_v3t = get_post_meta( $post->ID, '_kad_project_val03_title', true );
				    						$project_v3d = get_post_meta( $post->ID, '_kad_project_val03_description', true );
				    						$project_v4t = get_post_meta( $post->ID, '_kad_project_val04_title', true );
				    						$project_v4d = get_post_meta( $post->ID, '_kad_project_val04_description', true );
				    						$project_v5t = get_post_meta( $post->ID, '_kad_project_val05_title', true );
				    						$project_v5d = get_post_meta( $post->ID, '_kad_project_val05_description', true ); ?>
				    <?php if ($project_v1t != '') echo '<li class="pdetails"><span>'.$project_v1t.'</span> '.$project_v1d.'</li>'; ?>
				    <?php if ($project_v2t != '') echo '<li class="pdetails"><span>'.$project_v2t.'</span> '.$project_v2d.'</li>'; ?>
				    <?php if ($project_v3t != '') echo '<li class="pdetails"><span>'.$project_v3t.'</span> '.$project_v3d.'</li>'; ?>
				    <?php if ($project_v4t != '') echo '<li class="pdetails"><span>'.$project_v4t.'</span> '.$project_v4d.'</li>'; ?>
				    <?php if ($project_v5t != '') echo '<li class="pdetails"><span>'.$project_v5t.'</span> <a href="'.$project_v5d.'" target="_new">'.$project_v5d.'</a></li>'; ?>
				    </ul><!--Portfolio-content-->
				</div>
				</div>
    	</div><!--textclass -->
    </div><!--row-->
    <div class="clearfix"></div>
    </div><!--postclass-->
    <footer>
      <?php wp_link_pages(array('before' => '<nav id="page-nav" class="wp-pagenavi"><p>' . __('Pages:', 'virtue'), 'after' => '</p></nav>')); ?>
      <?php global $post; $portfolio_carousel_recent = get_post_meta( $post->ID, '_kad_portfolio_carousel_recent', true ); if ($portfolio_carousel_recent == 'similar') { get_template_part('templates/similarportfolio', 'carousel'); } else if ($portfolio_carousel_recent == 'recent') { get_template_part('templates/recentportfolio', 'carousel');} ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
</div>