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
<title>Insert Columns</title>
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
		var coutput = jQuery('#icon-dialog select#columnoutput').val(); 		 
		 
		var output = '';
		
		// setup the output of our shortcode
		switch (coutput)
			{
		case '1':
			output = '<img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnstart mceItem" title="hcolumns" />';
			if(document.getElementById('2column').checked) {
				  	output += '<div class="span6"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span6 mceItem" title="columnhelper span6" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span6"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span6 mceItem" title="columnhelper span6" />';
					output += '<p>add content here</p>';
					output += '</div> ';
				}else if(document.getElementById('2columnright').checked) {
				  	output += '<div class="span4"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span4 mceItem" title="columnhelper span4" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span8"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span8 mceItem" title="columnhelper span8" />';
					output += '<p>add content here</p>';
					output += '</div> ';
				}else if(document.getElementById('2columnleft').checked) {
				  	output += '<div class="span8"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span8 mceItem" title="columnhelper span8" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span4"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span4 mceItem" title="columnhelper span4" />';
					output += '<p>add content here</p>';
					output += '</div> ';
				}else if(document.getElementById('3column').checked) {
				  	output += '<div class="span4"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span4 mceItem" title="columnhelper span4" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span4"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span4 mceItem" title="columnhelper span4" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span4"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span4 mceItem" title="columnhelper span4" />';
					output += '<p>add content here</p>';
					output += '</div> ';
				}else if(document.getElementById('4column').checked) {
				  	output += '<div class="span3"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span3 mceItem" title="columnhelper span3" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span3"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span3 mceItem" title="columnhelper span3" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span3"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span3 mceItem" title="columnhelper span3" />';
					output += '<p>add content here</p>';
					output += '</div> ';
					output += '<div class="span3"><img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnhelper span3 mceItem" title="columnhelper span3" />';
					output += '<p>add content here</p>';
					output += '</div> ';
				}
				output += '<img src="'+tinymce.baseURL+'/plugins/wpgallery/img/t.gif" class="columnend mceItem" title="/hcolumns" />';
				
		break;
		default:
				output = '[columns] ';
				if(document.getElementById('2column').checked) {
					output += '[span6] ';
					output += '<p>add content here</p>';
					output += '[/span6]';
					output += '[span6] ';
					output += '<p>add content here</p>';
					output += '[/span6]';
				}else if(document.getElementById('2columnright').checked) {
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span8] ';
					output += '<p>add content here</p>';
					output += '[/span8]';
				}else if(document.getElementById('2columnleft').checked) {
					output += '[span8] ';
					output += '<p>add content here</p>';
					output += '[/span8]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
				}else if(document.getElementById('3column').checked) {
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
					output += '[span4] ';
					output += '<p>add content here</p>';
					output += '[/span4]';
				}else if(document.getElementById('4column').checked) {
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
					output += '[span3] ';
					output += '<p>add content here</p>';
					output += '[/span3]';
				}

				output += '[/columns]';
		}
			
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
 
</script>
<style type="text/css" media="screen"> #icon-dialog label {font-size:12px; line-height:24px; width:150px; display:inline-block; text-align:right;} #icon-dialog label.imglabel {width: auto; text-align: left; padding-left: 10px;} #icon-dialog a#insert {margin-top:2px;} #icon-dialog p {font-size:12px;} #icon-dialog .option-row {padding-bottom:6px; border-bottom: solid 1px #d7d7d7; margin-bottom:8px;} #icon-dialog select {width:159px; height:24px;} </style>

</head>
<body>
	<div id="icon-dialog">
		<form action="/" method="get" id="columnform" accept-charset="utf-8">
        	<div>
            <p>Choose a Column Layout:</p>
            </div>
            <div class="option-row">
				<label for="column-option">Choose Column Output:</label>
				<select name="column-one" id="columnoutput">
                	<option value="1">Visual Aid</option>
                	<option value="2">Shortcodes</option>
                    </select>
			</div>
			<div class="option-row">
				<label for="2column">Two Column</label>
				<input type="radio" name="column" value="2column" id="2column">
				<label class="imglabel" for="2column"><img src="<?php echo get_template_directory_uri()?>/assets/img/twocolumn.jpg" /></label>
				</div>
			<div class="option-row">
				<label for="2columnright">Two Column Offset Right</label>
				<input type="radio" name="column" value="2columnright"id="2columnright">
				<label class="imglabel" for="2columnright"><img src="<?php echo get_template_directory_uri()?>/assets/img/twocolumnright.jpg" /></label>
			</div>
			<div class="option-row">
				<label for="2columnleft">Two Column Offset Left</label>
				<input type="radio" name="column" value="2columnleft"id="2columnleft">
				<label class="imglabel" for="2columnleft"><img src="<?php echo get_template_directory_uri()?>/assets/img/twocolumnleft.jpg" /></label>
			</div>
			<div class="option-row">
				<label for="3column">Three Column</label>
				<input type="radio" name="column" value="3column"id="3column">
				<label class="imglabel" for="3column"><img src="<?php echo get_template_directory_uri()?>/assets/img/threecolumn.jpg" /></label>
			</div>
			<div class="option-row">
				<label for="4column">Four Column</label>
				<input type="radio" name="column" value="4column"id="4column">
				<label class="imglabel" for="4column"><img src="<?php echo get_template_directory_uri()?>/assets/img/fourcolumn.jpg" /></label>
			</div>
			<div>	
				<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" style="display: block; line-height: 24px; text-align:center">Insert</a>
			</div>
		</form>
	</div>
</body>
</html>