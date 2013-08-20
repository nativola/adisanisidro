
<div class="featclass home-portfolio home-margin carousel_outerrim home-padding">
<div class="container">
		<?php global $smof_data; $portfolio_title = $smof_data['portfolio_title']; 
		if($portfolio_title != '') {$porttitle = $portfolio_title; } else { $porttitle = __('Featured Projects', 'virtue'); } ?>
		<div class="clearfix"><h3 class="hometitle"><?php echo $porttitle; ?></h3></div>
		<?php global $smof_data; $portfolio_category = $smof_data['portfolio_type'];
					$portfolio_item_types = $smof_data['porfolio_show_type'];
					if($portfolio_category == "All") {$portfolio_category = '';}
					   		$columnnum = 'threecolumn'; $imgwidth = 370; $imgheight = 370;
					   		?>

		<div class="home-margin fredcarousel">
		<div id="portfolio-carousel" class="clearfix <?php echo $columnnum; ?>">
		<?php 
				$temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_type' => 'portfolio',
					'portfolio-type'=>$portfolio_category,
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
</div> <!-- fred Carousel-->
</div> <!-- Container-->
</div> <!--featclass -->