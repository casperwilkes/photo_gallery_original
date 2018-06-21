<?php

/* Define the core paths
  Define them as absolute paths to make sure that require_once works as expected 
 */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
//defined('DS') ? null : define('DS', '/');

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'var' . DS . 'www' . DS . 'photo_gallery');

defined('LIB_Path') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');

// Load config file first
require_once(LIB_PATH . DS . 'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH . DS . 'functions.php');

// load core objects
require_once(LIB_PATH . DS . 'session.php');
require_once(LIB_PATH . DS . 'database.php');
require_once(LIB_PATH . DS . 'database_object.php');
require_once(LIB_PATH . DS . 'pagination.php');

// load database-related classes
require_once(LIB_PATH . DS . 'user.php');
require_once(LIB_PATH . DS . 'photograph.php');
require_once(LIB_PATH . DS . 'comment.php');
?>
