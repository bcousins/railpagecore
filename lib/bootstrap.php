<?php
	/**
	 * RailpageCore bootstrapper
	 * @since Version 3.8.7
	 * @package Railpage
	 * @author Michael Greenhill
	 */
	
	if (php_sapi_name() == "cli") {
		$_SERVER['SERVER_NAME'] = gethostname(); 
	}
	
	if (!defined("RP_DEBUG")) {
		define("RP_DEBUG", false);
	}
	
	if (!defined("DS")) {
		define("DS", DIRECTORY_SEPARATOR);
	}
	
	if (!defined("RP_SITE_ROOT")) {
		define("RP_SITE_ROOT", __DIR__);
	}
	
	/**
	 * Check if PHPUnit is running. Flag it if it is running, so we can set the appropriate DB settings
	 */
	
	$PHPUnitTest = false;
	
	if (class_exists("PHPUnit_Framework_TestCase")) {
		$PHPUnitTest = true;
		
		require_once(dirname(__DIR__) . DS . "tests" . DS . "inc.functions.php");
		require_once(dirname(__DIR__) . DS . "tests" . DS . "inc.memcache.php");
		require_once(dirname(__DIR__) . DS . "tests" . DS . "inc.config.railpage.php");
		
		/**
		 * Load the composer autoloader
		 */
		
		if (file_exists(__DIR__ . DS . "vendor" . DS . "autoload.php")) {
			require(__DIR__ . DS . "vendor" . DS . "autoload.php");
		}
		
		/**
		 * Add to the include path
		 */
		
		set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__) . DIRECTORY_SEPARATOR . "etc");
		
		/**
		 * Set some server vars to compensate for the fact that we're not interacting with the internet
		 */
		
		if (!isset($_SERVER['REMOTE_ADDR'])) {
			$_SERVER['REMOTE_ADDR'] = "127.0.0.1";
		}
		
		if (!isset($_SERVER['REMOTE_HOST'])) {
			$_SERVER['REMOTE_HOST'] = "phpunit";
		}
	}
	
	/**
	 * Load some functions required by this library
	 */
	
	require_once("includes" . DIRECTORY_SEPARATOR . "functions.php");
	
	/**
	 * Load the autoloader
	 */
	
	require_once("autoload.php");
	
?>