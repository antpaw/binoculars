<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Berlin');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

//-- Configuration and initialization -----------------------------------------

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'		=> '/',
	'index_file'	=> '',
));

Kohana::modules(array(
	'database'   		=> MODPATH.'database',  	 // Database access
	'image'      		=> MODPATH.'image',     	 // Image manipulation
	'orm'        		=> MODPATH.'orm',       	 // Object Relationship Mapping
	'antpaw_extends'	=> MODPATH.'antpaw_extends',
	'debugwithstyle'	=> MODPATH.'debugwithstyle',
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	// 'oauth'      => MODPATH.'oauth',      // OAuth authentication
	// 'pagination' => MODPATH.'pagination', // Paging of results
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Debug helper
 */
function d($var, $die = TRUE)
{
	print D::debug($var);
	if ($die === TRUE)
	{
		die();
	}
}

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
if (Kohana::config('global')->environment !== Kohana::DEVELOPMENT)
{
	Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));
}

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('page', 'page((/<id>)/<action>)', array('action' => '\D+', 'id' => '\d+'))
	->defaults(array(
		'controller' => 'page',
		'action'	 => 'manage',
	));

Route::set('page_short', 'page/<id>', array('id' => '\d+'))
	->defaults(array(
		'controller' => 'page',
		'action'	 => 'show',
	));

Route::set('page_even_shorter', '<id>', array('id' => '\d+'))
	->defaults(array(
		'controller' => 'page',
		'action'	 => 'show',
	));

Route::set('default', '(<controller>(/<action>(/<id>)))', array('action' => '\D+', 'id' => '\d+'))
	->defaults(array(
		'controller' => 'page',
		'action'	 => 'manage',
	));

if ( ! defined('SUPPRESS_REQUEST'))
{
	/**
	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
	 * If no source is specified, the URI will be automatically detected.
	 */
	echo Request::instance()
		->execute()
		->send_headers()
		->response;
}
