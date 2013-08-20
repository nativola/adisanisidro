<?php
//Shortcode for year
function kad_year_shortcode_function() {
    $year = date('Y');
	return $year;
}
function kad_copyright_shortcode_function() {
	return '&copy;';
}
function kad_sitename_shortcode_function() {
	$sitename = get_bloginfo('name');
	return $sitename;
}
function kad_themecredit_shortcode_function() {
	$my_theme = wp_get_theme();
	$output = '- WordPress Theme by <a href="'.$my_theme->{'Author URI'}.'">Kadence Themes</a>';
	return $output;
}
//Shortcode for accordion
function kad_accordion_shortcode_function($atts, $content ) {
	$GLOBALS['pane_count'] = 0;
	do_shortcode( $content );
	if( is_array( $GLOBALS['panes'] ) ){
		
	foreach( $GLOBALS['panes'] as $tab ){
	$tabs[] = '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle '.$tab['open'].'" data-toggle="collapse" data-parent="#accordionname" href="#collapse'.$tab['link'].'"><h5><i class="icon-minus primary-color"></i><i class="icon-plus"></i>'.$tab['title'].'</h5></a></div><div id="collapse'.$tab['link'].'" class="accordion-body collapse '.$tab['in'].'"><div class="accordion-inner postclass">'.$tab['content'].'</div></div></div>';

}
$return = "\n".'<div class="accordion" id="accordionname">'.implode( "\n", $tabs ).'</div>'."\n";
}
return $return;
}

function kad_accordion_pane_function($atts, $content ) {
	extract(shortcode_atts(array(
'title' => 'Pane %d',
'start' => ''
), $atts));
if ($start != '') {$open = 'open';} else {$open = '';}
if ($start != '') {$in = 'in';} else {$in = '';}

$x = $GLOBALS['pane_count'];
$GLOBALS['panes'][$x] = array( 'title' => $title, 'open' => $open, 'in' => $in, 'link' => $GLOBALS['pane_count'], 'content' =>  do_shortcode( $content ) );

$GLOBALS['pane_count']++;
}
function kad_tab_shortcode_function($atts, $content ) {
	$GLOBALS['tab_count'] = 0;
	do_shortcode( $content );
	if( is_array( $GLOBALS['tabs'] ) ){
		
	foreach( $GLOBALS['tabs'] as $nav ){
	$tabnav[] = '<li class="'.$nav['active'].'"><a href="#sctab'.$nav['link'].'">'.$nav['title'].'</a></li>';
	}
		
	foreach( $GLOBALS['tabs'] as $tab ){
	$tabs[] = '<div class="tab-pane clearfix '.$tab['active'].'" id="sctab'.$tab['link'].'">'.$tab['content'].'</div>';
	}
	
$return = "\n".'<ul class="nav nav-tabs sc_tabs">'.implode( "\n", $tabnav ).'</ul> <div class="tab-content postclass">'.implode( "\n", $tabs ).'</div>'."\n";
}
return $return;
}
function kad_tab_pane_function($atts, $content ) {
	extract(shortcode_atts(array(
'title' => 'Tab %d',
'start' => ''
), $atts));
if ($start != '') {$active = 'active';} else {$active = '';}

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => $title, 'active' => $active, 'link' => $GLOBALS['tab_count'], 'content' =>  do_shortcode( $content ) );

$GLOBALS['tab_count']++;
}

//Shortcode for columns
function kad_column_shortcode_function( $atts, $content ) {
	return '<div class="row-fluid">'.do_shortcode($content).'</div>';
}
function kad_hcolumn_shortcode_function( $atts, $content ) {
	return '<div class="row-fluid">'.do_shortcode($content).'</div>';
}
function kad_column11_function( $atts, $content ) {
	return '<div class="span11">'.do_shortcode($content).'</div>';
}
function kad_column10_function( $atts, $content ) {
	return '<div class="span10">'.do_shortcode($content).'</div>';
}
function kad_column9_function( $atts, $content ) {
	return '<div class="span9">'.do_shortcode($content).'</div>';
}
function kad_column8_function( $atts, $content ) {
	return '<div class="span8">'.do_shortcode($content).'</div>';
}
function kad_column7_function( $atts, $content ) {
	return '<div class="span7">'.do_shortcode($content).'</div>';
}
function kad_column6_function( $atts, $content ) {
	return '<div class="span6">'.do_shortcode($content).'</div>';
}
function kad_column5_function( $atts, $content ) {
	return '<div class="span5">'.do_shortcode($content).'</div>';
}
function kad_column4_function( $atts, $content ) {
	return '<div class="span4">'.do_shortcode($content).'</div>';
}
function kad_column3_function( $atts, $content ) {
	return '<div class="span3">'.do_shortcode($content).'</div>';
}
function kad_column2_function( $atts, $content ) {
	return '<div class="span2">'.do_shortcode($content).'</div>';
}
function kad_column1_function( $atts, $content ) {
	return '<div class="span1">'.do_shortcode($content).'</div>';
}
//Shortcode for Icons
function kad_icon_shortcode_function( $atts) {
	extract(shortcode_atts(array(
		'icon' => '',
		'size' => '',
		'color' => '',
		'float'=> ''
), $atts));
if ($float != '') $output = '<i class="'.$icon.'" style="font-size:'.$size.'; color:'.$color.'; float:'.$float.'; padding:10px;"></i>';
else $output = '<i class="'.$icon.'" style="font-size:'.$size.'; color:'.$color.';"></i>';
	return $output;
}
// Video Shortcode
function kad_video_shortcode_function( $atts, $content) {
	extract(shortcode_atts(array(
		'width' => '',
), $atts));
	if($width != '') { $output = '<div style="max-width:'.$width.'px;"><div class="videofit">'.$content.'</div></div>';}
	else { $output = '<div class="videofit">'.$content.'</div>'; }
	return $output;
}
//Button
function kad_button_shortcode_function( $atts) {
	extract(shortcode_atts(array(
		'bcolor' => '',
		'link' => '',
		'text' => '',
		'tcolor' => '',
), $atts));
	return '<a href="'.$link.'" class="kad-btn kad-btn-primary" style="background-color:'.$bcolor.'; color:'.$tcolor.'">'.$text.'</a>';
}
function kad_blockquote_shortcode_function( $atts, $content) {
	extract(shortcode_atts(array(
		'align' => 'center',
), $atts));
		switch ($align)
	{
		case "center":
		$output = '<div class="blockquote-full postclass clearfix">' . do_shortcode($content) . '</div>';
		break;
		
		case "left":
		$output = '<div class="blockquote-left postclass clearfix">' . do_shortcode($content) . '</div>';
		break;
		
		case "right":
		$output = '<div class="blockquote-right postclass clearfix">' . do_shortcode($content) . '</div>';
		break;
	}
	  return $output;
}
function kad_pullquote_shortcode_function( $atts, $content) {
   extract( shortcode_atts( array(
	  'align' => 'center'
  ), $atts ));

	switch ($align)
	{
		case "center":
		$output = '<div class="pullquote-center">' . do_shortcode($content) . '</div>';
		break;
		
		case "right":
		$output = '<div class="pullquote-right">' . do_shortcode($content) . '</div>';
		break;
		
		case "left":
		$output = '<div class="pullquote-left">' . do_shortcode($content) . '</div>';
		break;
	}

   return $output;
}
function kad_hrule_function( ) {
	return '<div class="hrule clearfix"></div>';
}
function kad_hrpadding10_function( ) {
	return '<div class="space_20 clearfix"></div>';
}
function kad_hrpadding20_function( ) {
	return '<div class="space_40 clearfix"></div>';
}
function kad_hrpadding40_function( ) {
	return '<div class="space_80 clearfix"></div>';
}
function kad_clearfix_function( ) {
	return '<div class="clearfix"></div>';
}
function kad_columnhelper_function( ) {
	return '';
}
function virtue_register_shortcodes(){
	add_shortcode('the-year', 'kad_year_shortcode_function');
	add_shortcode('copyright', 'kad_copyright_shortcode_function');
	add_shortcode('site-name', 'kad_sitename_shortcode_function');
	add_shortcode('theme-credit', 'kad_themecredit_shortcode_function');
   add_shortcode('accordion', 'kad_accordion_shortcode_function');
   add_shortcode('pane', 'kad_accordion_pane_function');
   add_shortcode('tabs', 'kad_tab_shortcode_function');
   add_shortcode('tab', 'kad_tab_pane_function');
   add_shortcode('columns', 'kad_column_shortcode_function');
   add_shortcode('hcolumns', 'kad_hcolumn_shortcode_function');
   add_shortcode('span11', 'kad_column11_function');
   add_shortcode('span10', 'kad_column10_function');
   add_shortcode('span9', 'kad_column9_function');
   add_shortcode('span8', 'kad_column8_function');
   add_shortcode('span7', 'kad_column7_function');
   add_shortcode('span6', 'kad_column6_function');
   add_shortcode('span5', 'kad_column5_function');
   add_shortcode('span4', 'kad_column4_function');
   add_shortcode('span3', 'kad_column3_function');
   add_shortcode('span2', 'kad_column2_function');
   add_shortcode('span1', 'kad_column1_function');
   add_shortcode('columnhelper', 'kad_columnhelper_function');
   add_shortcode('icon', 'kad_icon_shortcode_function');
   add_shortcode('video', 'kad_video_shortcode_function');
   add_shortcode('pullquote', 'kad_pullquote_shortcode_function');
   add_shortcode('blockquote', 'kad_blockquote_shortcode_function');
   add_shortcode('btn', 'kad_button_shortcode_function');
   add_shortcode('hr', 'kad_hrule_function');
   add_shortcode('space_20', 'kad_hrpadding10_function');
   add_shortcode('space_40', 'kad_hrpadding20_function');
   add_shortcode('space_80', 'kad_hrpadding40_function');
   add_shortcode('clear', 'kad_clearfix_function');
}
add_action( 'init', 'virtue_register_shortcodes');


function virtue_register_button( $buttons ) {
   array_push( $buttons, "|", "kadcolumns_button" );
   array_push( $buttons, "|", "kaddivider_button" );
   array_push( $buttons, "|", "kadaccordion_button" );
   array_push( $buttons, "|", "kadquote_button" );
   array_push( $buttons, "|", "kadbtn_button" );
   array_push( $buttons, "|", "kadicon_button" );
   array_push( $buttons, "|", "kadvideo_button" );      
   return $buttons;
}
function virtue_add_plugin( $plugin_array ) {
   $plugin_array['kadcolumns'] = get_template_directory_uri() . '/lib/shortcodes/columns/columns_shortgen.js';
   $plugin_array['kadicon'] = get_template_directory_uri() . '/lib/shortcodes/icons/icon_shortgen.js';
   $plugin_array['kadaccordion'] = get_template_directory_uri() . '/lib/shortcodes/accordion/accordion_shortgen.js';
   $plugin_array['kadvideo'] = get_template_directory_uri() . '/lib/shortcodes/video/video_shortgen.js';
   $plugin_array['kadquote'] = get_template_directory_uri() . '/lib/shortcodes/pullquote/quote_shortgen.js';
   $plugin_array['kadbtn'] = get_template_directory_uri() . '/lib/shortcodes/btns/btns_shortgen.js';
   $plugin_array['kaddivider'] = get_template_directory_uri() . '/lib/shortcodes/divider/divider_shortgen.js';
   return $plugin_array;
}
function virtue_tinymce_shortcode_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'virtue_add_plugin' );
      add_filter( 'mce_buttons_3', 'virtue_register_button' );
   }

}
add_action('init', 'virtue_tinymce_shortcode_button');

add_filter('widget_text', 'do_shortcode');
/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function wpex_clean_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');