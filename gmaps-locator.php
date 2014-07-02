<?php
/*
Plugin Name: Google Maps Locator
Plugin URI: http://www.pateason.com
Description: Location map built on Google's Maps API. Add multiple locations, call the shortcode, and let your users find your locations based on geolocation, Google Places Search, and more.
Version: 0.7
Author: Pat Eason
Author URI: http://www.pateason.com
License: GPLv2
*/

	if(!defined('ABSPATH')) {
		exit();
	}
	// GLOBAL PATHS

	/* =======================================================
		Define any global paths that you might
		want to use later on. This makes it easier to refer
		to paths and URLs that are relative to your plug-in.
		Feel free to add more.
	======================================================= */

	//this is the plug-in directory name
	if(!defined("GMAPS_LOCATOR")) {
		define("GMAPS_LOCATOR", trim(dirname(plugin_basename(__FILE__)), '/'));
	}

	//this is the path to the plug-in's directory
	if(!defined("GMAPS_LOCATOR_DIR")) {
		define("GMAPS_LOCATOR_DIR", WP_PLUGIN_DIR . '/' . GMAPS_LOCATOR);
	}

	//this is the url to the plug-in's directory
	if(!defined("GMAPS_LOCATOR_URL")) {
		define("GMAPS_LOCATOR_URL", WP_PLUGIN_URL . '/' . GMAPS_LOCATOR);
	}

	//include acf-lite
	define('ACF_LITE',true);
	include_once(GMAPS_LOCATOR_DIR.'/assets/libs/advanced-custom-fields/acf.php');
	include_once(GMAPS_LOCATOR_DIR.'/assets/libs/advanced-custom-fields-coordinates/acf-coordinates.php');
	include_once(GMAPS_LOCATOR_DIR . '/assets/classes/GMAPS_LOCATOR_fields.php');

	/* =======================================================
		Open /assets/classes/Plugin_Options.class.php
		and add any tables, options, or capabilities
		that you need added. This class has some methods
		for handling prefixing names and logging errors.
	======================================================= */

	// OPTIONS
	include_once(GMAPS_LOCATOR_DIR . '/assets/classes/GMAPS_LOCATOR_Options.class.php');

	/* =======================================================
		Open /assets/classes/GMAPS_LOCATOR.class.php
		and begin adding any functionality you need. This
		class has some default methods you may find useful
	======================================================= */

	//LOGIC
	include_once(GMAPS_LOCATOR_DIR . '/assets/classes/GMAPS_LOCATOR.class.php');

	/* =======================================================
		Any classes you add should extend the Plugin_Options_Name
		class so that you have access to the prefixing and logging methods.
	======================================================= */

	if(class_exists('GMAPS_LOCATOR')) {
		$GMAPS_LOCATOR = new GMAPS_LOCATOR();
		register_activation_hook(__FILE__, array($GMAPS_LOCATOR, 'activate'));
		register_deactivation_hook(__FILE__, array($GMAPS_LOCATOR, 'deactivate'));
	}
