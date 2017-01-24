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
$sql = 'SELECT content_id, title FROM content WHERE parent_id=0 AND show_in_menu=1';
$res = $db->getArray($sql);
if($res != false) {
    foreach ($res as $page) {
        $item->set('name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);
        $menu->add('items', $item->parse());
    }
}
$tmpl->set('menu', $menu->parse());

?>