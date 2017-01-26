<?php

/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/26/2017
 * Time: 14:34
 */
class session
{
    // class variables
    var $sid = false;
    var $vars = false;
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;

    // class methods
    // construct
    function __construct(&$hhtp, &$db) {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
    }
}