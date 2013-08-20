(function() {
	tinymce.create('tinymce.plugins.kadbtn', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('kadbtn', function() {
				ed.windowManager.open({
					file : url + '/btns_popup.php', // file that contains HTML for our modal window
					width : 350 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 400 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('kadbtn_button', {title : 'Insert Button', cmd : 'kadbtn', image: url + '/img/btn.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Insert Button',
				author : 'Benjamin Ritner',
				authorurl : 'http://kadencethemes.com',
				infourl : 'http://kadencethemes.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	// Register plugin
	// first parameter is the button ID and must match ID elsewhere
	// second parameter must match the first parameter of the tinymce.create() function above
	tinymce.PluginManager.add('kadbtn', tinymce.plugins.kadbtn);

})();