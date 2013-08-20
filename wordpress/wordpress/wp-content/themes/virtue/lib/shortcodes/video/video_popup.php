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
<title>Insert Video</title>
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
		var video = jQuery('#icon-dialog textarea#video').val();
		var width = jQuery('#icon-dialog input#width').val(); 		 
		 
		var output = '';
			if(width)
			output += '<img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="kadvideo mceItem" title="video width='+width+'" />';
			else {
			output += '<img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="kadvideo mceItem" title="video" />';
			}
			output += video;
			output += '<img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="kadvideoend mceItem" title="/video" />';
			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<style type="text/css" media="screen"> #icon-dialog label {font-size:12px; display:block; padding:4px;}  #icon-dialog textarea#video{display:block; height:100px; width:270px; font-size:10px;} #icon-dialog input#width{display:inline-block; height:25px; width:100px; font-size:12px; margin-bottom:10px;} #icon-dialog a#insert {margin-top:10px;}

</style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" accept-charset="utf-8">
        	<div>
				<label for="tabs">(Optional) Max Width</label>
				<input type="text" name="width" value="" id="width" /><span style="display:inline-block; padding-left:5px;">(*note just use number)</span>
			</div>
			<div>
				<label for="tabs">Video Iframe Code</label>
				<textarea name="video" id="video" /></textarea>
			</div>
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px; text-align:center">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>