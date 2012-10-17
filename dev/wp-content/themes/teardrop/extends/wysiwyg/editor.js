(function() {
	tinymce.PluginManager.requireLangPack('kotofey_shortcodes');
	tinymce.create('tinymce.plugins.kotofey_shortcodes', {
		init : function(ed, url) {

			ed.addCommand('mcekotofey_shortcodes', function() {
				ed.windowManager.open({
					file : url + '/interface.php',
					width : 290 + ed.getLang('kotofey_shortcodes.delta_width', 0),
					height : 150 + ed.getLang('kotofey_shortcodes.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			
			ed.addButton('kotofey_shortcodes', {
				title : 'Click to add a shortcode',
				cmd : 'mcekotofey_shortcodes',
				image : url + '/shortcode_button.png'
			});

			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('kotofey_shortcodes', n.nodeName == 'IMG');
			});
		},
		
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'kotofey_shortcodes',
					author 	  : 'kotofey',
					authorurl : 'http://themeforest.net/user/kotofey',
					infourl   : 'http://themeforest.net/user/kotofey',
					version   : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('kotofey_shortcodes', tinymce.plugins.kotofey_shortcodes);
})();


