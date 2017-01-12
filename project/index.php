<?php
// index.php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/12/2017
 * Time: 12:58
 */
// create template object
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
require_once CLASSES_DIR.'template.php';

// and use it
// create an empty template object
$tmpl = new template('main.html');
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
?>