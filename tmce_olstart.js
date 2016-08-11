// External plugin for WordPress TinyMCE Advanced Editor
// Adds button for OL tag - starts numeric list from entering number
// Author: Nikita Akimov
// E-mail: force--majeure@yandex.ru
tinymce.PluginManager.add('tmce_olstart_button', function(editor) {
	function showDialog() {
		var name = '';
		var selectedNode = editor.selection.getNode();
		if(selectedNode.tagName != 'OL') selectedNode = selectedNode.parentNode;
		if(selectedNode.tagName == 'OL') {
			editor.windowManager.open({
				title: 'OL Start',
				body: {type: 'textbox', name: 'name', size: 5, label: 'From:', value: name},
				onsubmit: function(e) {
					selectedNode.start = e.data.name;
				}
			});
		}
	}

	editor.addButton('tmce_olstart_button', {
		image: '_PATH_/tmce_olstart.png',	// Change _PATH_ to the right path to image file
		tooltip: 'OL Start',
		onclick: showDialog
	});
});
