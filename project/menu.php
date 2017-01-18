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
$menu = new template('menu.menu'); // menu directory is menu/menu.html
$item = new template('menu.item');

echo '<pre>';
print_r($menu);
print_r($item);
echo '</pre>';

?>