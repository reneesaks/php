<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 2/6/2017
 * Time: 09:39
 */

function tr($txt) {
    static $trans = false;

    // if default language
    if(LANG_ID == DEFAULT_LANG) {
        return $txt;
    }

    // if lang file not found, find it
    if($transe === false) {
        $fn = LANG_DIR.'lang'.LANG_ID.'php';
        if(file_exists($fn) and is_file($fn) and is_readable($fn)) {
            require_once($fn);
            $trans = $_trans;
        } else {
            $trans = array();
        }
    }

    if(isset($trans[$txt])) {
        return $trans[$txt];
    }

    // if nothing found return default text
    return $txt;
}

?>