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
<title>Insert Divider</title>
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
		var divider = jQuery('#icon-dialog select#divider').val(); 		 
		 
		var output = '';
		
		// setup the output of our shortcode
		switch(divider) {
		case 'hr':
				output += '[hr]';
		  break;
		  case 'space_20':
		  	output += '[space_20]';
		  break;
		  case 'space_40':
		  	output += '[space_40]';
		  break;
		  case 'space_80':
		  	output += '[space_80]';
		  break;
		  default:
		  output += '[clear]';
	}
			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<style type="text/css" media="screen"> #icon-dialog label {font-size:14px; display:block; padding:4px;}  #icon-dialog select {display:block; height:28px; width:200px; font-size:12px;} #icon-dialog a#insert {margin-top:10px;}

</style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" accept-charset="utf-8">
			<div>
				<label for="dividers">Choose a Divider</label>
				<select name="divider" id="divider">
                	<option value="hr">Line</option>
                    <option value="space_20">Padding Small</option>
                    <option value="space_40">Padding Medium</option>
                    <option value="space_80">Padding Large</option>
                    <option value="clear">Clear</option>
                 </select>
			</div>
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px; text-align:center">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>