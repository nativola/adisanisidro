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
<title>Insert Styled Quote</title>
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
		var quote = jQuery('#icon-dialog select#quote').val(); 
		var align = jQuery('#icon-dialog select#align').val(); 		 
		 
		var output = '';
		if(quote == 'pull')
			output += '[pullquote align=' + align + ']<p>Sample Text</p>[/pullquote]<br />';
			else {
			output += '[blockquote align=' + align + ']<p>Sample Text </p>[/blockquote]<br />';
			}
			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<style type="text/css" media="screen"> #icon-dialog label {font-size:14px; display:inline-block; padding:4px;} #icon-dialog select {display:block; height:28px; width:200px; font-size:12px;} .linebreak {margin-bottom:6px; border-bottom: solid 1px #d7d7d7; padding-bottom:6px} #icon-dialog a#insert {margin-top:10px;}

</style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" accept-charset="utf-8">
        <div class="linebreak">
        	<div>
				<label for="text">Style</label>
				<select name="quote" id="quote">
                	<option value="pull">Pull-Quote</option>
					<option value="block">Block-Quote</option>
                 </select>
			</div>
            </div>
            <div class="linebreak">
			<div>
				<label for="text">Align</label>
				<select name="quote" id="align">
                	<option value="center">Center</option>
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