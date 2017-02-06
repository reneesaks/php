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
// load temlate content
$tmpl = new template('main');
// require language
require_once(BASE_DIR.'lang.php');
// add pairs of temlate element names and real values
$tmpl->set('style', STYLE_DIR.'main'.'.css');
$tmpl->set('header', 'minu lehe pealkiri');

// create and output menu
// import menu file
require_once 'menu.php'; // in this file is menu creation
$tmpl->set('menu', $menu->parse());
require_once 'act.php';
$tmpl->set('nav_bar', $sess->user_data['username']);
$tmpl->set('lang_bar', LANG_ID);
// output template content set up with real values
echo $tmpl->parse();
// control actions
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