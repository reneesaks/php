<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/30/2017
 * Time: 12:33
 */

$username = $http->get('username');
$password = $http->get('password');

$sql = 'SELECT * FROM user WHERE '.
    'username='.fixDb($username).' AND '.
    'password='.fixDb(md5($password)).' AND '.
    'is_active=1';
$res = $db->getArray($sql);

if($res === false) {
    $sess->set('login_error', 'Viga sisselogimisel');

    $link = $http->getLink(array('act'=>'login'), array('username'));
    $http->redirect($link);
} else {
    $sess->createSession();
    $tmpl->set('nav_bar', 'Sisselogimine õnnestus!');
    print_r($res);
}

?>