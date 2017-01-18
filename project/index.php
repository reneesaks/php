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
// import http class
require_once CLASSES_DIR.'http.php';
// import linkobject class
require_once CLASSES_DIR.'linkobject.php';
// create and output http object from linkobject class
$http = new linkobject();
// control http object output
echo '<pre>';
print_r($http);
echo '</pre>';
// control http constants
echo REMOTE_ADDR.'<br />';
echo PHP_SELF.'<br />';
echo SCRIPT_NAME.'<br />';
echo HTTP_HOST.'<br />';
echo '<hr />';
// create http data pairs and set up into $http->vars array
$http->set('kasutaja', 'renee');
$http->set('tund', 'php programmeerimisvahendid');
// control $http->vars object output
echo '<pre>';
print_r($http->vars);
echo '</pre>';
// control link creation
$link = $http->getLink(array('kasutaja' => 'renee', 'parool' => 'qwerty'));
echo $link;
?>