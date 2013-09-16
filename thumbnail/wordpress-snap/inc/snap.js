(function() {
	tinymce.create('tinymce.plugins.WordPressSnapPlugin', {
		init : function(ed, url) {
		ed.addCommand('mceWordPressSnap', function() {
		ed.windowManager.open({
			file : url + '/snap.php',
			width : 450 + parseInt(ed.getLang('wpsnap.delta_width', 0)),
			height : 350 + parseInt(ed.getLang('wpsnap.delta_height', 0)),
			inline : 1
		}, {
			plugin_url : url
		});
});

ed.addButton('wpsnap', {title : 'WordPress Snap', cmd : 'mceWordPressSnap', image: url + '/icon.png' });}});
tinymce.PluginManager.add('wpsnap', tinymce.plugins.WordPressSnapPlugin);})();