(function() {
	tinymce.create('tinymce.plugins.kadaccordion', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('kadaccordion', function() {
				ed.windowManager.open({
					file : url + '/accordion_popup.php', // file that contains HTML for our modal window
					width : 350 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 110 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('kadaccordion_button', {title : 'Insert Accordion or Tab', cmd : 'kadaccordion', image: url + '/img/accordion.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Insert Accordion or Tab',
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
	tinymce.PluginManager.add('kadaccordion', tinymce.plugins.kadaccordion);

})();