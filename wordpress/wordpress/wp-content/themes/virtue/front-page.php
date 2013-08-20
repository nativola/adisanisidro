
			<?php global $smof_data; if(detect_mobile() && $smof_data['mobile_slider'] == '1') {
		 		$slider = $smof_data['choose_mobile_slider'];
					 if ($slider == "flex") {
					get_template_part('templates/mobile_home/mobileflex', 'slider');
				}
				else if ($slider == "video") {
					get_template_part('templates/mobile_home/mobilevideo', 'block');
				} 
	} else { ?>
    		<?php global $smof_data; $slider = $smof_data['choose_slider'];
					 if ($slider == "flex") {
					get_template_part('templates/home/flex', 'slider');
				}
				else if ($slider == "thumbs") {
					get_template_part('templates/home/thumb', 'slider');
				}
				else if ($slider == "fullwidth") {
					get_template_part('templates/home/fullwidth', 'slider');
				}
				else if ($slider == "video") {
					get_template_part('templates/home/video', 'block');
				}
}?>
	
    <div id="content" class="container homepagecontent">
   		<div class="row">
          <div class="main <?php echo kadence_main_class(); ?>" role="main">

      	<?php $layout = $smof_data['homepage_layout']['enabled'];

				if ($layout):

				foreach ($layout as $key=>$value) {

				    switch($key) {

				    	case 'block_one':?>
						    <div id="homeheader" class="welcomeclass">
								<div class="container">
									<?php get_template_part('templates/page', 'header'); ?>
								</div><!--container-->
							</div><!--titleclass-->
					    <?php 
					    break;
						case 'block_four': ?>
							<?php if(is_home()) { ?>
							<div class="homecontent postlist fullwidth clearfix home-margin"> 
							<?php while (have_posts()) : the_post(); ?>
							  <?php get_template_part('templates/content', 'fullwidth'); ?>
							<?php endwhile; ?>
							</div> 
						<?php } else { ?>
						<div class="homecontent clearfix home-margin"> 
							<?php get_template_part('templates/content', 'page'); ?>
						</div>
						<?php 	}
						break;
						case 'block_five':
								get_template_part('templates/home/blog', 'home'); 
						break;
						case 'block_six':
								get_template_part('templates/home/portfolio', 'carousel');		 
						break; 
						case 'block_seven':
								get_template_part('templates/home/icon', 'menu');		 
						break;  
					    }

}
endif; ?>   


</div><!-- /.main -->