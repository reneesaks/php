<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 2/6/2017
 * Time: 09:11
 */

$sep = new Template('lang.sep');
$sep = $sep->parse();
$count = 0;

foreach($siteLangs as $lang_id => $lang_name) {
    $count++;
    if($lang_id == LANG_ID) {
        $item = new Template('lang.active');
    } else {
        $item = new Template('lang.item');
    }
    $link = $http->getLink(array('lang_id' => $lang_id),
        array('act', 'page_id'), array('lang_id'));
    $item->set('link', $link);
    $item->set('name', $lang_name);
    $tmpl->add('lang_bar', $item->parse());

    if($count < count($siteLangs)) {
        $tmpl->add('lang_bar', $sep);
    }
}