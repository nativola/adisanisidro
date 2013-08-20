<?php

$wp_include = "../wp-load.php";
$i = 0;
while (!file_exists($wp_include) && $i++ < 10) {
  $wp_include = "../$wp_include";
}

// let's load WordPress
require($wp_include);

if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));
?>
<!DOCTYPE html>
<head>
<title>Insert Icon</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/icons/js/icon-select.js"></script>
<link href="<?php echo get_template_directory_uri() ?>/lib/icons/css/icon-select.css" rel="stylesheet"/>
<link href="<?php echo get_template_directory_uri() ?>/assets/css/icons.css" rel="stylesheet"/>
<script type="text/javascript">
 
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
	 
		// Try and remove existing style / blockquote
		tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		 
		// set up variables to contain our input values
		var icon = jQuery('#icon-dialog select#icon-icon').val();
		var size = jQuery('#icon-dialog select#icon-size').val();
		var color = jQuery('#icon-dialog select#icon-color').val();
		var colorhex = jQuery('#icon-dialog input#icon-color-hex').val();
		var float = jQuery('#icon-dialog select#icon-align').val();		 		 
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[icon ';
			output += 'icon=' + icon + ' ';
			output += 'size=' + size + ' ';
			if(colorhex)
				output += ' color=' + colorhex + ' ';
				else {
				output += 'color=' + color + ' ';
				}
			if(float == 'none')
				output += '';
				else {
			output += 'float=' + float;
				}
			
		// check to see if the TEXT field is blank
			output += ']';
			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<?php  $icons = array(
    array('name' => '', 'value' => ''), array('name' => 'icon-home'), array('name' => 'icon-pencil'), array('name' => 'icon-quill'), array('name' => 'icon-images'), array('name' => 'icon-image'), array('name' => 'icon-image-2'), array('name' => 'icon-camera'), array('name' => 'icon-camera-2'), array('name' => 'icon-camera-3'), array('name' => 'icon-music'), array('name' => 'icon-headphones'), array('name' => 'icon-brush'), array('name' => 'icon-grid-view-1'), array('name' => 'icon-users'), array('name' => 'icon-connection'), array('name' => 'icon-megaphone'), array('name' => 'icon-books'), array('name' => 'icon-book'), array('name' => 'icon-newspaper'), array('name' => 'icon-certificate'), array('name' => 'icon-cc'), array('name' => 'icon-tag'), array('name' => 'icon-folder-open'), array('name' => 'icon-cart'), array('name' => 'icon-basket'), array('name' => 'icon-tags'), array('name' => 'icon-mail-send'), array('name' => 'icon-location'), array('name' => 'icon-location-2'), array('name' => 'icon-envelop'), array('name' => 'icon-address-book'), array('name' => 'icon-map'), array('name' => 'icon-direction'), array('name' => 'icon-clock'), array('name' => 'icon-print'), array('name' => 'icon-calendar'), array('name' => 'icon-calendar-2'), array('name' => 'icon-screen'), array('name' => 'icon-laptop'), array('name' => 'icon-mobile'), array('name' => 'icon-mobile-2'), array('name' => 'icon-tablet'), array('name' => 'icon-drawer'), array('name' => 'icon-cabinet'), array('name' => 'icon-bubble'), array('name' => 'icon-bubbles'), array('name' => 'icon-bubble-2'), array('name' => 'icon-user'), array('name' => 'icon-users-2'), array('name' => 'icon-vcard'), array('name' => 'icon-equalizer'), array('name' => 'icon-equalizer-2'), array('name' => 'icon-search'), array('name' => 'icon-expand'), array('name' => 'icon-lock'), array('name' => 'icon-cogs'), array('name' => 'icon-stats-up'), array('name' => 'icon-rocket'), array('name' => 'icon-meter'), array('name' => 'icon-fire'), array('name' => 'icon-lamp'), array('name' => 'icon-remove'), array('name' => 'icon-truck'), array('name' => 'icon-switch'), array('name' => 'icon-shield'), array('name' => 'icon-menu'), array('name' => 'icon-grid'), array('name' => 'icon-link'), array('name' => 'icon-star'), array('name' => 'icon-star-2'), array('name' => 'icon-heart'), array('name' => 'icon-heart-2'), array('name' => 'icon-happy'), array('name' => 'icon-wink'), array('name' => 'icon-grin'), array('name' => 'icon-cool'), array('name' => 'icon-shocked'), array('name' => 'icon-checkmark'), array('name' => 'icon-box'), array('name' => 'icon-minus'), array('name' => 'icon-plus'), array('name' => 'icon-loop'), array('name' => 'icon-arrow-up'), array('name' => 'icon-arrow-right'), array('name' => 'icon-arrow-down'), array('name' => 'icon-arrow-left'), array('name' => 'icon-arrow-up-2'), array('name' => 'icon-arrow-right-2'), array('name' => 'icon-arrow-down-2'), array('name' => 'icon-arrow-left-2'), array('name' => 'icon-arrow-up-3'), array('name' => 'icon-arrow-right-3'), array('name' => 'icon-arrow-down-3'), array('name' => 'icon-arrow-left-3'), array('name' => 'icon-checkbox-checked'), array('name' => 'icon-vector'), array('name' => 'icon-rulers'), array('name' => 'icon-page-break'), array('name' => 'icon-new-tab'), array('name' => 'icon-code'), array('name' => 'icon-mail'), array('name' => 'icon-google-plus'), array('name' => 'icon-google-plus-2'), array('name' => 'icon-facebook'), array('name' => 'icon-facebook-2'), array('name' => 'icon-instagram'), array('name' => 'icon-twitter'), array('name' => 'icon-twitter-2'), array('name' => 'icon-feed'), array('name' => 'icon-feed-2'), array('name' => 'icon-youtube'), array('name' => 'icon-vimeo'), array('name' => 'icon-vimeo2'), array('name' => 'icon-flickr'), array('name' => 'icon-flickr-2'), array('name' => 'icon-picassa'), array('name' => 'icon-picassa-2'), array('name' => 'icon-dribbble'), array('name' => 'icon-dribbble-2'), array('name' => 'icon-forrst'), array('name' => 'icon-forrst-2'), array('name' => 'icon-deviantart'), array('name' => 'icon-deviantart-2'), array('name' => 'icon-github'), array('name' => 'icon-github-2'), array('name' => 'icon-blogger'), array('name' => 'icon-blogger-2'), array('name' => 'icon-wordpress'), array('name' => 'icon-wordpress-2'), array('name' => 'icon-tumblr'), array('name' => 'icon-tumblr-2'), array('name' => 'icon-skype'), array('name' => 'icon-linkedin'), array('name' => 'icon-stumbleupon'), array('name' => 'icon-stumbleupon-2'), array('name' => 'icon-pinterest'), array('name' => 'icon-pinterest-2'), array('name' => 'icon-battery'), array('name' => 'icon-ruler'), array('name' => 'icon-cogs-2'), array('name' => 'icon-bars'), array('name' => 'icon-bag'), array('name' => 'icon-tshirt'), array('name' => 'icon-food'), array('name' => 'icon-food-2'), array('name' => 'icon-glass'), array('name' => 'icon-glass-2'), array('name' => 'icon-film'), array('name' => 'icon-clock-2'), array('name' => 'icon-quotes-right'), array('name' => 'icon-quotes-left'), array('name' => 'icon-earth'), array('name' => 'icon-download'), array('name' => 'icon-upload'), array('name' => 'icon-airplane'), array('name' => 'icon-flag'), array('name' => 'icon-anchor'), array('name' => 'icon-weather-lightning'), array('name' => 'icon-weather-rain'), array('name' => 'icon-weather-snow'), array('name' => 'icon-sun'), array('name' => 'icon-link-2'), array('name' => 'icon-checkmark-circle'), array('name' => 'icon-cancel-circle'));

  ?>
<style type="text/css" media="screen"> #icon-dialog label {font-size:14px; display:block; padding:4px;}  #icon-dialog label.hex {font-size:12px; line-height:24px; display:inline-block; padding:6px 4px 6px 12px;} .linebreak {margin-bottom:6px; border-bottom: solid 1px #d7d7d7; padding-bottom:6px}  #icon-dialog input#icon-color-hex {display:inline-block; height:24px;} #icon-dialog a#insert {margin-top:15px;}

</style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" accept-charset="utf-8">
        <div class="linebreak">
			<div>
				<label for="button-url">Choose Icon</label>
				<select name="icon-icon" class="kad_icomoon" id="icon-icon">
<?php  foreach ($icons as $icon) {
    echo '<option value="'.$icon['name']. '">'.$icon['name']. '</option>';
  }?>
                    </select>
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="icon-size">Icon Size</label>
				<select name="icon-icon" class="kad_icomoon" id="icon-size">
<option value="5px">5px</option>
<option value="6px">6px</option>
<option value="7px">7px</option>
<option value="8px">8px</option>
<option value="9px">9px</option>
<option value="10px">10px</option>
<option value="11px">11px</option>
<option value="12px">12px</option>
<option value="13px">13px</option>
<option value="14px" selected="selected">14px</option>
<option value="15px">15px</option>
<option value="16px">16px</option>
<option value="17px">17px</option>
<option value="18px">18px</option>
<option value="19px">19px</option>
<option value="20px">20px</option>
<option value="21px">21px</option>
<option value="22px">22px</option>
<option value="23px">23px</option>
<option value="24px">24px</option>
<option value="25px">25px</option>
<option value="26px">26px</option>
<option value="27px">27px</option>
<option value="28px">28px</option>
<option value="29px">29px</option>
<option value="30px">30px</option>
<option value="31px">31px</option>
<option value="32px">32px</option>
<option value="33px">33px</option>
<option value="34px">34px</option>
<option value="35px">35px</option>
<option value="36px">36px</option>
<option value="37px">37px</option>
<option value="38px">38px</option>
<option value="39px">39px</option>
<option value="40px">40px</option>
<option value="41px">41px</option>
<option value="42px">42px</option>
<option value="43px">43px</option>
<option value="44px">44px</option>
<option value="45px">45px</option>
<option value="46px">46px</option>
<option value="47px">47px</option>
<option value="48px">48px</option>
<option value="49px">49px</option>
<option value="50px">50px</option>
<option value="51px">51px</option>
<option value="52px">52px</option>
<option value="53px">53px</option>
<option value="54px">54px</option>
<option value="55px">55px</option>
<option value="56px">56px</option>
<option value="57px">57px</option>
<option value="58px">58px</option>
<option value="59px">59px</option>
<option value="60px">60px</option>
<option value="61px">61px</option>
<option value="62px">62px</option>
<option value="63px">63px</option>
<option value="64px">64px</option>
<option value="65px">65px</option>
<option value="66px">66px</option>
<option value="67px">67px</option>
<option value="68px">68px</option>
<option value="69px">69px</option>
<option value="70px">70px</option>
<option value="71px">71px</option>
<option value="72px">72px</option>
<option value="73px">73px</option>
<option value="74px">74px</option>
<option value="75px">75px</option>
<option value="76px">76px</option>
<option value="77px">77px</option>
<option value="78px">78px</option>
<option value="79px">79px</option>
<option value="80px">80px</option>
                 </select>
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="icon-color">Icon Color</label>
				<select name="icon-color" class="kad_icomoon" id="icon-color">
                	<option value="#000">Black</option>
                    <option value="#CDCDCD">Light-Gray</option>
					<option value="#999">Gray</option>
                    <option value="#444">Dark-Gray</option>
                    <option value="#CCC">Silver</option>
                    <option value="#FFF">White</option>
                    <option value="#F2F2F2">Off-White</option>
                    <option value="#FF0000">Red</option>
                    <option value="#0000FF">Blue</option>
                    <option value="#008000">Green</option>
                    <option value="#FFFF00">Yellow</option>
                    <option value="#FFA500">Orange</option>
                    <option value="#FF00FF">Pink</option>
                    <option value="#800080">Purple</option>
                    <option value="#8B4513">Brown</option>
                    <option value="#800000">Maroon</option>
                    
                 </select>
			</div>
			<div>
				<label class="hex"for="icon-color-hex">Or Type Hex Color</label>
				<input type="text" name="icon-color-hex" value="" id="icon-color-hex" />
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="icon-align">Icon Float</label>
				<select name="icon-align" class="kad_icomoon" id="icon-align">
                	<option value="none">None</option>
					<option value="left">Left</option>
					<option value="right">Right</option>
                 </select>
			</div>
            </div>
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px; text-align:center">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>