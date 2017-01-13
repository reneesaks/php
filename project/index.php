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
define('STYLE_DIR', 'css/');
require_once CLASSES_DIR.'template.php';

// and use it
// create an empty template object
$tmpl = new template('main');

$tmpl->set('style', STYLE_DIR.'style.css');

// add pairs of template element names and real values
$tmpl->set('title', 'my site title');
$tmpl->set('menu', 'my menu');
$tmpl->set('nav_bar', 'my nav');
$tmpl->set('lang', 'my language switcher');
$tmpl->set('content', 'my content');

/*
// control the content of template object
echo '<pre>';
print_r($tmpl);
echo '</pre>';
*/

echo $tmpl->parse();
?>