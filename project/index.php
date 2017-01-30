<?php
// index.php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/12/2017
 * Time: 12:58
 */
// import conf.php
require_once 'conf.php';

// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');

// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');

// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());
$tmpl->set('nav_bar', $sess->user_data['username']);
$tmpl->set('lang_bar', 'minu keeleriba');
// $tmpl->set('content', 'minu sisu');
$tmpl->set('content', $http->get('content'));

// output template content set up with real values
echo $tmpl->parse();
// control actions
// import act file
require_once 'act.php';
// control database object
// create test query
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
// control database query result
require_once 'dbg.php';
dbg($res);
$sess->flush();
dbg($db->showHistory());
// control session
dbg($sess);
?>