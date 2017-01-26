<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/26/2017
 * Time: 14:52
 */

function fixDb($val) {
    return '"'.addslashes($val).'"';
}

function dbg($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}