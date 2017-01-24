<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/18/2017
 * Time: 10:34
 */

// menu.php - create page menu
// create menu template objects
// for menu and menu items
$menu = new template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$item = new template('menu.item');
$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'"';
$res = $db->getArray($sql);
if($res !== FALSE) {
    $page = $res[0];
    $http->set('content', $page['content']);
}

?>