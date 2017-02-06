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
define('LANG_DIR', 'lang/'); // lang path

// import useful functions
require_once LIB_DIR.'utils.php';

// user roles
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);

define('DEFAULT_LANG', 'et');

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

// language support
$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian'
);
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id])) {
    $lang_id = DEFAULT_LANG;
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);

require_once LIB_DIR.'trans.php';
?>
