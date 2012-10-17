(function() {
	// Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack('scgenerator');
	tinymce.create('tinymce.plugins.scgenerator', {

		init : function(ed, url) {

			ed.addCommand('scgenerator', function() {
				ed.windowManager.open({
					file : themepath+'/addpress/ap_shortcode_generator.php',
					width : 450,
					height : 600,
					inline : 1
				});
			});

			ed.addButton('scgenerator', {
				title : 'Add Custom Shortcode',
				cmd : 'scgenerator',
				image : url + '/shortcodes.png'
			});

			/*ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('scgenerator', n.nodeName == 'IMG');
			});*/
		},

		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		}
	});

	// Register plugin
	tinymce.PluginManager.add('scgenerator', tinymce.plugins.scgenerator);
})();