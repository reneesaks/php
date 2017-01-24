<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/18/2017
 * Time: 15:13
 */

$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'"';
$res = $db->getArray($sql);
{
    $page = $res[0];
    $http->set('page_id', $page['content_id']);
    $tmpl->set('content', $page['content']);
}