<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/18/2017
 * Time: 15:13
 */

require_once 'dbg.php';

$page_id = $http->get('page_id');
$sql = 'SELECT * FROM content WHERE content_id="'.$page_id.'"';
$res = $db->getArray($sql);
if($res !== FALSE) {
    dbg($res);
}