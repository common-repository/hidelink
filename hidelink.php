<?php
/*
Plugin Name: Hidelink
Plugin URI: http://phpface.net/plugin-hidelink
Description: Hidelink if user not login, using shortcode, example [hidelink url=http://codex.wordpress.org/Shortcode_API]
Version: 1.0
Author: thesun2012
Author URI: http://phpface.net
*/
if(!function_exists('phpface_hidelink_shortcode')){
	function phpface_hidelink_shortcode($attr){
		if(is_user_logged_in()){
			return '<a target="_blank" href="'.$attr['url'].'">'.$attr['url'].'</a>';
		}
		else{
			return '<a href="'.get_bloginfo('url').'/wp-login.php?redirect_to='.phpface_selfURL().'">'.__('Login to view link','phpface').'</a>';
		}
	}
	add_shortcode('hidelink', 'phpface_hidelink_shortcode');
}
function phpface_selfURL() {
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = "http".$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
		: (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}