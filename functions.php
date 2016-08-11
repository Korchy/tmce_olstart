<?php
// External plugin for WordPress TinyMCE Advanced Editor
// Adds button for OL tag - starts numeric list from entering number
// Author: Korchiy
// E-mail: force--majeure@yandex.ru
function tmceOlStartButton() {
	global $typenow;
	if(!current_user_can('edit_posts') && !current_user_can('edit_pages')) return;
	if(!in_array($typenow, array('post', 'page')))	return;
	if(get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "tmceAddOlStartButtonPlugin");
		add_filter('mce_buttons', 'tmceRegisterOlStartButton');
	}
}
function tmceAddOlStartButtonPlugin($plugin_array) {
	$plugin_array['tmce_olstart_button'] = "_PATH_/tmce_olstart.js";	// Change _PATH_ to the rigth path to file
	return $plugin_array;
}
function tmceRegisterOlStartButton($buttons) {
	array_push($buttons, "tmce_olstart_button");
	return $buttons;
}
add_action('admin_head', 'tmceOlStartButton');