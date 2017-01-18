<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/18/2017
 * Time: 14:25
 */
// get act element value from url
$act = $http->get('act');
// define act file path according to the act element value
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
// control act file
if(file_exists($fn) and is_file($fn) and is_readable($fn)) {
    // import act file
    require_once $fn;
} else {
    // use default act

}
?>