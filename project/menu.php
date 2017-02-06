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
$menu = new Template('menu.menu'); // in menu directory is file menu.html menu/menu.html
$menu->set('items', false);
$item = new Template('menu.item');
$sql = 'SELECT content_id, title FROM content '.
        'WHERE parent_id=0 AND show_in_menu=1';
if(ROLE_ID != ROLE_ADMIN) {
    $sql .= ' AND is_hidden = 0';
}
$sql .= ' ORDER BY sort ASC';
$res = $db->getArray($sql);
if($res != false) {
    foreach ($res as $page) {
        $item->set('name', tr($page['title']));
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $item->set('link', $link);
        $menu->add('items', $item->parse());
    }
}
if(USER_ID != ROLE_NONE) {
    $link = $http->getLink(array('act' => 'logout'));
    $item->set('link', $link);
    $item->set('name', tr('Logi välja'));
    $item->add('items', $item->parse());
}
$tmpl->set('menu', $menu->parse());

?>