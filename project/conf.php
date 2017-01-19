<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/19/2017
 * Time: 12:19
 */
// create template objects
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/');
define('DEFAULT_ACT', 'default');

require_once CLASSES_DIR.'template.php'; // import template class
require_once CLASSES_DIR.'http.php'; // import http class
require_once CLASSES_DIR.'linkobject.php'; // import linkobject class

$http = new linkobject(); // create http object from linkobject class
?>