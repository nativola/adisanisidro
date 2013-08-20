	<?php
/*
Template Name: Portfolio Grid
*/
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
      	<?php global $post; $portfolio_category = get_post_meta( $post->ID, '_kad_portfolio_type', true ); 
			   				   $portfolio_items = get_post_meta( $post->ID, '_kad_portfolio_items', true ); 
								 $portfolio_cat = get_term_by ('id',$portfolio_category,'portfolio-type' );
							$portfolio_cat_slug = $portfolio_cat -> slug;
							  $portfolio_cat_ID = $portfolio_cat -> term_id;
					
					   		$portfolio_category = $portfolio_cat_slug;
							if($portfolio_items == 'all') { $portfolio_items = '-1'; }
					?>
      

                   <?php global $post; $portfolio_column = get_post_meta( $post->ID, '_kad_portfolio_columns', true ); if ($portfolio_column == '1') { $columnnum = 'onecolumn'; $imgwidth = 1150; $imgheight = 643; $sliderheight = 643;} else if ($portfolio_column == '2') {$columnnum = 'twocolumn'; $imgwidth = 565; $imgheight = 565; $sliderheight = 565;} else if ($portfolio_column == '3'){ $columnnum = 'threecolumn'; $imgwidth = 370; $imgheight = 370; $sliderheight = 370;} else {$columnnum = 'fourcolumn'; $imgwidth = 272; $imgheight = 272; $sliderheight = 272;}   ?> 
                   <?php global $post; $portfolio_item_excerpt = get_post_meta( $post->ID, '_kad_portfolio_item_excerpt', true ); $portfolio_item_types = get_post_meta( $post->ID, '_kad_portfolio_item_types', true );  ?>
                   <?php $crop = true; ?>
                   <?php global $post; $portfolio_cropheight = get_post_meta( $post->ID, '_kad_portfolio_img_crop', true ); if ($portfolio_cropheight != '') $imgheight = $portfolio_cropheight; ?>
               <div id="portfoliowrapper" class="<?php echo $columnnum; ?>"> 
   
            <?php 
				$temp = $wp_query; 
				  $wp_query = null; 
				  $wp_query = new WP_Query();
				  $wp_query->query(array(
					'paged' => $paged,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_type' => 'portfolio',
					'portfolio-type'=>$portfolio_cat_slug,
					'posts_per_page' => $portfolio_items));
					$count =0;
					?>
					<?php if ( $wp_query ) : 
							 
					while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                    <?php
						$terms = get_the_terms( $post->ID, 'portfolio-type' );
								
						if ( $terms && ! is_wp_error( $terms ) ) : 
							$links = array();

							foreach ( $terms as $term ) 
							{
								$links[] = $term->name;
							}
							$links = str_replace(' ', '-', $links);	
							$tax = join( " ", $links );		
						else :	
							$tax = '';	
						endif;
						?>
                	<div class="grid_item portfolio_item <?php echo strtolower($tax); ?> all postclass">
						<?php 		if (has_post_thumbnail( $post->ID ) ) {
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
                           <?php }  ?>
              	<a href="<?php the_permalink() ?>" class="portfoliolink">
              		<div class="piteminfo">   
                          <h5><?php the_title();?></h5>
                           <?php if($portfolio_item_types == true) { $terms = get_the_terms( $post->ID, 'portfolio-type' ); if ($terms) {?> <p class="cportfoliotag"><?php $output = array(); foreach($terms as $term){ $output[] = $term->name;} echo implode(', ', $output); ?></p> <?php } } ?>
                          <?php if($portfolio_item_excerpt == true) {?> <p><?php echo excerpt(16); ?></p> <?php } ?>
                    </div>
                </a>
                </div>
                    
					<?php endwhile; else: ?>
					 
					<li class="error-not-found"><?php _e('Sorry, no portfolio entries found.', 'virtue');?></li>
						
				<?php endif; ?>
                </div> <!--portfoliowrapper-->
                                    
                    <?php if ($wp_query->max_num_pages > 1) : ?>
                            <?php if(function_exists('wp_pagenavi')) { ?>
                            <?php wp_pagenavi(); ?>   
                            <?php } else { ?>      
                            <nav id="post-nav" class="pager">
                                <div class="previous"><?php next_posts_link(__('&larr; Older posts', 'virtue')); ?></div>
                                <div class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'virtue')); ?></div>
                              </nav>
                            <?php } ?> 
                    <?php endif; ?>
                    <?php 
                      $wp_query = null; 
                      $wp_query = $temp;  // Reset
                    ?>
                    <?php wp_reset_query(); ?>
</div><!-- /.main -->