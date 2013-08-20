<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
   <title><?php global $smof_data; global $post; $title = get_post_meta( $post->ID, '_kad_seo_title', true ); if ($title != '') echo $title; else if ($smof_data['seo_sitetitle'] !='') echo $smof_data['seo_sitetitle']; else {wp_title('|', true, 'right');}?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php global $smof_data; global $post; $description = get_post_meta( $post->ID, '_kad_seo_description', true ); if ($description != '') echo $description; else if ($smof_data['seo_sitedescription'] !='') echo $smof_data['seo_sitedescription']; else bloginfo('description'); ?>" />
  <link rel="shortcut icon" type="image/x-icon" href="<?php global $smof_data; echo $smof_data['custom_favicon']; ?>" />
  <?php $blog_virtue = get_bloginfo('template_url');?>
  <script type="text/javascript">
  	var virtue_URL = "<?php echo $blog_virtue ?>";
  </script>
  <?php wp_head(); ?>

  <?php get_template_part('templates/css'); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
