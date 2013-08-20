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
<title>Insert Button</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
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
		var text = jQuery('#icon-dialog input#text').val();
		var tcolor = jQuery('#icon-dialog select#text-color').val();
		var texthex = jQuery('#icon-dialog input#text-color-hex').val();
		var bcolor = jQuery('#icon-dialog select#btn-color').val();
		var btnhex = jQuery('#icon-dialog input#btn-color-hex').val();
		var btnlink = jQuery('#icon-dialog input#btn-link').val();		 		 
		 
		var output = '';
		
		// setup the output of our shortcode
		output = '[btn ';
			output += 'text="' + text + '" ';
			if(texthex)
				output += ' tcolor=' + texthex + ' ';
				else {
					output += 'tcolor=' + tcolor + ' ';
				}
			if(btnhex) {
				output += ' bcolor=' + btnhex + ' ';
			} else {
				if(bcolor) {
					output += 'bcolor=' + bcolor + ' ';
					} else {
						output += '';
					}
			}
			output += 'link="' + btnlink +'"';
			output += ']';
			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>

<style type="text/css" media="screen"> #icon-dialog label {font-size:14px; display:block; padding:4px;} #icon-dialog label.hex {font-size:12px; line-height:24px; display:inline-block; padding:6px 4px 6px 12px;} #icon-dialog select {display:block; height:28px; width:300px; font-size:12px;} #icon-dialog input {display:block; width:300px; height:24px;} #icon-dialog input.btn-hex {display:inline-block; width:120px; height:24px;} #icon-dialog a#insert {margin-top:15px;} .linebreak {margin-bottom:6px; border-bottom: solid 1px #d7d7d7; padding-bottom:6px}

</style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" accept-charset="utf-8">
        <div class="linebreak">
			<div>
				<label for="btn-text">Button Text</label>
				<input type="text" name="btn_text" value="" id="text" />
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="btn-color">Text Color</label>
				<select name="btn-color" id="text-color">
                	<option value="#FFF">White</option>
                    <option value="#F2F2F2">Off-White</option>
                	<option value="#000">Black</option>
                    <option value="#CDCDCD">Light-Gray</option>
					<option value="#999">Gray</option>
                    <option value="#444">Dark-Gray</option>
                    <option value="#CCC">Silver</option>
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
				<label class="hex" for="text-color-hex">Or Type Hex Color</label>
				<input type="text"class="btn-hex" name="text-color-hex" value="" id="text-color-hex" />
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="btn-color">Button Color</label>
				<select name="btn-color" id="btn-color">
                	<option value="">Primary Color</option>
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
				<label class="hex" for="btn-color-hex">Or Type Hex Color</label>
				<input type="text" class="btn-hex" name="btn-color-hex" value="" id="btn-color-hex" />
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="btn-link">Button Link</label>
				<input type="text" name="btn-link" value="" id="btn-link" />
			</div>
            </div>
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px; text-align:center">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>