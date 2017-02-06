<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/18/2017
 * Time: 15:13
 */

require_once 'dbg.php';

$admin = array('<a href="#">test</a>');

$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'"';
$res = $db->getArray($sql);
{
    $page = $res[0];
    $http->set('page_id', $page['content_id']);
    if ($page_id == 4) {
        $tmpl->set('content', $admin[0]);
    } else {
        $tmpl->set('content', $page['content']);
    }
}