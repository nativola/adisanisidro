
        		<div id="blog_carousel_container" class="carousel_outerrim">
           			<?php global $post; $text = get_post_meta( $post->ID, '_kad_blog_carousel_title', true ); if( $text != '') { echo '<h3 class="title">'.$text.'</h3>'; } else {echo '<h3 class="title">'.__('Similar Posts', 'virtue').'</h3>';} ?>
            <div class="blog-carouselcase fredcarousel">
            	<?php if (kadence_display_sidebar()) { 
            	$columns_class = 's-threecolumn'; } else { $columns_class = 'fourcolumn'; } ?>

            	<ul id="blog_carousel" class="blog_carousel <?php echo $columns_class; ?> clearfix">
                    <?php
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; }
				
				$temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=>6));
					$count =0;
			?>
                    <?php if ( $wp_query ) : 
					 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                	<li class="blog_item grid_item <?php post_class(); ?> clearfix">
				
	                    		<?php if (has_post_thumbnail( $post->ID ) ) {
										$image_url = wp_get_attachment_image_src( 
											get_post_thumbnail_id( $post->ID ), 'full' ); 
										$thumbnailURL = $image_url[0]; 
										$image = aq_resize($thumbnailURL, 272, 272, true); 
									}else { $theme_url = get_bloginfo('template_directory'); 
									$image = $theme_url.'/assets/img/post_standard.jpg';
								}?>
								
									 <div class="imghoverclass">
		                           		<a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
		                           			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="iconhover" style="display:block;">
		                           		</a> 
		                         	</div>
                           		<?php $image = null; $thumbnailURL = null; ?>
                           		
              <a href="<?php the_permalink() ?>" class="bcarousellink">
				                    <header>
			                          <h5 class="entry-title"><?php the_title(); ?></h5>
			                          <div class="subhead">
			                          	<span class="postday"><?php echo get_the_date('j M Y'); ?></span>
			                        </div>
			                          	
			                        </header>
		                        	<div class="entry-content">
		                          		<p><?php echo excerpt(16); ?></p>
		                        	</div>
		                      	
                           </a>
                </li>
					<?php endwhile; else: ?>
					 
					<li class="error-not-found"><?php _e('Sorry, no blog entries found.', 'virtue');?></li>
						
				<?php endif; ?>	
                <?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
                    <?php wp_reset_query(); ?>
													
			</ul>
     <div class="clearfix"></div>
            <a id="prevport_blog" class="prev_carousel icon-arrow-left" href="#"></a>
			<a id="nextport_blog" class="next_carousel icon-arrow-right" href="#"></a>
            </div>
</div><!-- Porfolio Container-->					