<?php
/**
 * @package showGplus
 * @version 1.01
 */
/*
Plugin Name: showGplus
Plugin URI: http://oxo.nu/tag/showgplus
Description: Show G+ "Follow us" using a shortcode [showgplus] in posts.
Author: Niklas Rydén
Version: 1.01
Author URI: http://kafit.se/
*/

function showgplusfunc($gpparams) {

// We need to pass some parameters for this code to work.

//Provide the GPlusID you want to show followers for.
	$gpid = $gpparams['id'];
//Provide the locale you want to show
	$gplang = $gpparams['lang'];

        $width = '185';
	if (isset($gpparams['width'])) { $width = $gpparams['width']; }
	$height = '140';
	if (isset($gpparams['height'])) { $height = $gpparams['height']; }

	$output = '<div class="g-plus" data-width="'.$width.'" data-height="'.$height.'" data-href="//plus.google.com/'.$gpid.'" data-rel="publisher"></div>';
	$output = $output.'<script type="text/javascript">';
	$output = $output.'window.___gcfg = {lang: \''.$gplang.'\'};';
	$output = $output.'(function() {';
	$output = $output.'var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;';
	$output = $output.'po.src = \'https://apis.google.com/js/plusone.js\';';
	$output = $output.'var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);';
	$output = $output.'})();';
	$output = $output.'</script>';

	return $output;
}

add_shortcode('showgplus', 'showgplusfunc');

?>
