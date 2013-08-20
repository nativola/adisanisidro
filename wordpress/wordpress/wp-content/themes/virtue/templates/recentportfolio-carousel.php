
        		<div id="portfolio_carousel_container" class="carousel_outerrim">
           			<?php global $post; $text = get_post_meta( $post->ID, '_kad_portfolio_carousel_title', true ); if( $text != '') { echo '<h3 class="title">'.$text.'</h3>'; } else {echo '<h3 class="title">'.__('Recent Projects', 'virtue').'</h3>';} ?>
            <div class="portfolio-carouselcase fredcarousel">
            	<?php $columnnum = 'fourcolumn'; $imgwidth = 272; $imgheight = 272; ?>

            	<div id="portfolio-carousel" class=" <?php echo $columnnum; ?> clearfix">
                 <?php 
				$temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'orderby' => 'date',
					'order' => 'DESC',
					'post_type' => 'portfolio',
					'posts_per_page' => '6'));
					$count =0;
					?>
					<?php if ( $wp_query ) : 
							 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

					<div class="grid_item portfolio_item <?php echo strtolower($tax); ?> all postclass">
					
                        <?php global $post; $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
						     if ($postsummery == 'slider') { ?>
                           <div class="flexslider imghoverclass clearfix">
                       <ul class="slides ">
                          <?php 
						  $args = array(
								'order'          => 'ASC',
								'post_type'      => 'attachment',
								'post_parent'    => $post->ID,
								'post_mime_type' => 'image',
								'post_status'    => null,
								'orderby'		 => 'menu_order',
								'numberposts'    => 4,
							);
							$attachments = get_posts($args);							
							if ($attachments) {
								foreach ($attachments as $attachment) {
									$attachment_url = wp_get_attachment_url($attachment->ID , 'large');
									$image = aq_resize($attachment_url, $imgwidth, $imgheight, true); ?>
									<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" class="" /></a></li>
								<?php } ?>	
							<?php } ?>                            
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
              <?php } else {
								if (has_post_thumbnail( $post->ID ) ) {
									$image_url = wp_get_attachment_image_src( 
									get_post_thumbnail_id( $post->ID ), 'full' ); 
									$thumbnailURL = $image_url[0]; 
									if ($crop = true) { $image = aq_resize($thumbnailURL, $imgwidth, $imgheight, true); }
									else { $image = aq_resize($thumbnailURL, $imgwidth, $imgheight, false); }?>

									<div class="imghoverclass">
	                                       <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
	                                       <img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="lightboxhover" style="display: block;">
	                                       </a> 
	                                </div>
                           				<?php $image = null; $thumbnailURL = null;?>
                           <?php } } ?>
              	<a href="<?php the_permalink() ?>" class="portfoliolink">
              		<div class="piteminfo">   
                          <h5><?php the_title();?></h5>
                           <?php if($portfolio_item_types == 1) { $terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?> <p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> <?php } } ?>
                    </div>
                </a>
                </div>
					<?php endwhile; else: ?>
					 
					<li class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'virtue');?></li>
						
				<?php endif; ?>	
                <?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
                    <?php wp_reset_query(); ?>
													
			</div>
     <div class="clearfix"></div>
            <a id="prevport_portfolio" class="prev_carousel icon-arrow-left" href="#"></a>
			<a id="nextport_portfolio" class="next_carousel icon-arrow-right" href="#"></a>
            </div>
</div><!-- Porfolio Container-->					