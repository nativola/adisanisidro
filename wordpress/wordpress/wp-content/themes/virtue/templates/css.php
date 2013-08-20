<?php global $smof_data; 
//Logo
$logox1 = $smof_data['logo_upload']; 
$logox2 = $smof_data['x2logo_upload'];

$logo_width = $smof_data['logo_width']; 
$logo_height = $smof_data['logo_height'];

$logo_font = $smof_data['font_logo'];
$font_logo = $smof_data['font_logo_style'];

$logo_toppadding = $smof_data['logo_padding_top']; 
$logo_bottompadding = $smof_data['logo_padding_bottom'];
$logo_leftpadding = $smof_data['logo_padding_left']; 
$logo_rightpadding = $smof_data['logo_padding_right'];  

$menu_topmargin = $smof_data['menu_margin_top']; 
$menu_bottommargin = $smof_data['menu_margin_bottom'];

//Typography
$font_header = $smof_data['font_header'];
$font_h1 = $smof_data['font_h1'];
$font_h2 = $smof_data['font_h2'];
$font_h3 = $smof_data['font_h3'];
$font_h4 = $smof_data['font_h4'];
$font_h5 = $smof_data['font_h5'];

$font_body = $smof_data['font_body'];
$font_p = $smof_data['font_p'];

$font_menu = $smof_data['font_menu'];
$font_primary_menu = $smof_data['font_primary_menu'];
$font_secondary_menu = $smof_data['font_secondary_menu'];

//Basic Styling
$primary = $smof_data['primary_color'];
$primary20 = $smof_data['primary20_color'];
if($primary != '') { $primaryrgb = hex2rgb($primary); }

//Advanced Styling
$content_bg_color = $smof_data['content_bg_color'];
if ($smof_data['content_bg_img'] != '' ) { $content_bg_img = 'url('.$smof_data['content_bg_img'].')'; }
$content_bg_repeat = $smof_data['content_bg_repeat'];
$content_bg_x = $smof_data['content_bg_placementx'];
$content_bg_y = $smof_data['content_bg_placementy'];

$header_bg_color = $smof_data['header_bg_color'];
if ($smof_data['header_bg_img'] != '' ) { $header_bg_img = 'url('.$smof_data['header_bg_img'].')'; }
$header_bg_repeat = $smof_data['header_bg_repeat'];
$header_bg_x = $smof_data['header_bg_placementx'];
$header_bg_y = $smof_data['header_bg_placementy'];

$menu_bg_color = $smof_data['menu_bg_color'];
if ($smof_data['menu_bg_img'] != '' ) { $menu_bg_img = 'url('.$smof_data['menu_bg_img'].')'; }
$menu_bg_repeat = $smof_data['menu_bg_repeat'];
$menu_bg_x = $smof_data['menu_bg_placementx'];
$menu_bg_y = $smof_data['menu_bg_placementy'];

$feat_bg_color = $smof_data['feat_bg_color'];
if ($smof_data['feat_bg_img'] != '' ) { $feat_bg_img = 'url('.$smof_data['feat_bg_img'].')'; }
$feat_bg_repeat = $smof_data['feat_bg_repeat'];
$feat_bg_x = $smof_data['feat_bg_placementx'];
$feat_bg_y = $smof_data['feat_bg_placementy'];

$footer_bg_color = $smof_data['footer_bg_color'];
if ($smof_data['footer_bg_img'] != '' ) { $footer_bg_img = 'url('.$smof_data['footer_bg_img'].')'; }
$footer_bg_repeat = $smof_data['footer_bg_repeat'];
$footer_bg_x = $smof_data['footer_bg_placementx'];
$footer_bg_y = $smof_data['footer_bg_placementy'];

$boxedbg_color = $smof_data['boxed_bg_color'];
if ($smof_data['boxed_bg_img'] != '' ) { $boxedbg_img = 'url('.$smof_data['boxed_bg_img'].')'; }
$boxedbg_repeat = $smof_data['boxed_bg_repeat'];
$boxedbg_x = $smof_data['boxed_bg_placementx'];
$boxedbg_y = $smof_data['boxed_bg_placementy'];
$boxedbg_fixed = $smof_data['boxed_bg_fixed']; 

echo '<style type="text/css" media="screen">

  #thelogo {width:'.$logo_width.'px; height:'.$logo_height.'px; background:url('.$logox1.') no-repeat;}
  #logo {padding-top:'.$logo_toppadding.'px; padding-bottom:'.$logo_bottompadding.'px; margin-left:'.$logo_leftpadding.'px; margin-right:'.$logo_rightpadding.'px;}
  #nav-main ul.sf-menu {margin-top:'.$menu_topmargin.'px; margin-bottom:'.$menu_bottommargin.'px;}
  .logofont {font-family:'.$logo_font.';}, #logo a.brand {font-size:' . $font_h1['size']. '; font-weight:' . $font_h1['style']. '; line-height:' . $font_h1['height']. '; color:' . $font_h1['color']. ';}
  h1, h2, h3, h4, h5, .headerfont, .tp-caption {font-family:'.$font_header.';}
  h1 {font-size:' . $font_h1['size']. '; font-weight:' . $font_h1['style']. '; line-height:' . $font_h1['height']. '; color:' . $font_h1['color']. ';}
  h2 {font-size:' . $font_h2['size']. '; font-weight:' . $font_h2['style']. '; line-height:' . $font_h2['height']. '; color:' . $font_h2['color']. ';}
  h3 {font-size:' . $font_h3['size']. '; font-weight:' . $font_h3['style']. '; line-height:' . $font_h3['height']. '; color:' . $font_h3['color']. ';}
  h4 {font-size:' . $font_h4['size']. '; font-weight:' . $font_h4['style']. '; line-height:' . $font_h4['height']. '; color:' . $font_h4['color']. ';}
  h5 {font-size:' . $font_h5['size']. '; font-weight:' . $font_h5['style']. '; line-height:' . $font_h5['height']. '; color:' . $font_h5['color']. ';}
  body {font-family:'.$font_body.'; font-size:' . $font_p['size']. '; font-weight:' . $font_p['style']. '; line-height:' . $font_p['height']. '; color:' . $font_p['color']. ';}
  .sf-menu a, .menufont, .topbarmenu ul li {font-family:'.$font_menu.';}
  #nav-main ul.sf-menu a {font-size:' . $font_primary_menu['size']. '; font-weight:' . $font_primary_menu['style']. '; line-height:' . $font_primary_menu['height']. '; color:' . $font_primary_menu['color']. ';}
  #nav-second ul.sf-menu a {font-size:' . $font_secondary_menu['size']. '; font-weight:' . $font_secondary_menu['style']. '; line-height:' . $font_secondary_menu['height']. '; color:' . $font_secondary_menu['color']. ';}

  .home-message:hover {background-color:'.$primary.'; background-color: rgba('.$primaryrgb[0].', '.$primaryrgb[1].', '.$primaryrgb[2].', 0.6);}
  nav.woocommerce-pagination ul li a:hover, .wp-pagenavi a:hover, .accordion-heading .accordion-toggle.open {border-color: '.$primary.';}
  a:hover, #nav-main ul.sf-menu ul li a:hover, .product_price ins .amount, .color_primary, .primary-color, #logo a.brand, #nav-main ul.sf-menu a:hover,
  .woocommerce-message:before, .woocommerce-info:before, #nav-second ul.sf-menu a:hover, .footerclass a:hover {color: '.$primary.';}
  .widget_price_filter .ui-slider .ui-slider-handle, .product_item .kad_add_to_cart:hover, .kad-btn-primary, .woocommerce-message .button, 
  #containerfooter .menu li a:hover, .bg_primary, .portfolionav a:hover, .home-iconmenu a:hover, p.demo_store, .topclass {background: '.$primary.';}

  a {color: '.$primary20.';}
  .kad-btn-primary:hover, .woocommerce-message .button:hover {background: '.$primary20.';}

  .contentclass {background:'.$content_bg_color.' '.$content_bg_img.' '.$content_bg_repeat.' '.$content_bg_x.' '.$content_bg_y.';}
  .headerclass {background:'.$header_bg_color.' '.$header_bg_img.' '.$header_bg_repeat.' '.$header_bg_x.' '.$header_bg_y.';}
  .navclass {background:'.$menu_bg_color.' '.$menu_bg_img.' '.$menu_bg_repeat.' '.$menu_bg_x.' '.$menu_bg_y.';}
  .featclass {background:'.$feat_bg_color.' '.$feat_bg_img.' '.$feat_bg_repeat.' '.$feat_bg_x.' '.$feat_bg_y.';}
  .footerclass {background:'.$footer_bg_color.' '.$footer_bg_img.' '.$footer_bg_repeat.' '.$footer_bg_x.' '.$footer_bg_y.';}
  body {background:'.$boxedbg_color.' '.$boxedbg_img.' '.$boxedbg_repeat.' '.$boxedbg_x.' '.$boxedbg_y.'; background-attachment:'.$boxedbg_fixed.';}

  '.$smof_data['custom_css'].'
</style>';
if($logox2 != '') { echo '<style type="text/css" media="screen"> @media only screen and (-webkit-min-device-pixel-ratio: 1.5), only screen and (min--moz-device-pixel-ratio: 1.5), only screen and (min-device-pixel-ratio: 1.5) { #thelogo {background:url('.$logox2.') no-repeat; background-size:'.$logowidth.' '.$logoheight.'; }}</style>';} ?>
