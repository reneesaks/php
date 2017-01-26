<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/19/2017
 * Time: 12:19
 */
// create template objects
define('CLASSES_DIR', 'classes/'); // classes path
define('TMPL_DIR', 'tmpl/'); // templates path
define('STYLE_DIR', 'css/'); // styles path
define('ACTS_DIR', 'acts/'); // acts path
define('DEFAULT_ACT', 'default'); // default act file name
define('LIB_DIR', 'lib/'); // lib path

require_once LIB_DIR.'utils.php';

require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class
require_once CLASSES_DIR.'mysql.php'; // import database class
require_once 'db_conf.php'; // import database configuration
require_once CLASSES_DIR.'session.php';

// create and output http object from linkobject class
$http = new linkobject();
// create database object
$db = new mysql(DBHOST,DBUSER,DBPASS,DBNAME);
// create session object
$sess = new session($http, $db);
?>
