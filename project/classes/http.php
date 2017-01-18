<?php

/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/17/2017
 * Time: 12:48
 */

// useful function
function fixHtml($val) {
    return htmlentities($val);
}

class http
{
    // class variables
    var $server = array(); // server data
    var $vars = array(); // http data
    var $cookie = array(); // cookie data

    // class methods
    // construct
    // object creation and initialization via init() and initConst() methods
    function __construct() {
        $this->init();
        $this->initConst();
    }

    // initialize class variables
    function init() {
        $this->server = $_SERVER; // server real data
        $this->cookie = $_COOKIE; // cookie real data
        $this->vars = array_merge($_GET, $_POST, $_FILES); // http real data
    }

    // initialize class constants
    function initConst() {
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_HOST');
        foreach ($vars as $var) {
            if(!defined($var) and isset($this->server[$var])) {
                define($var, $this->server[$var]);
            }
        }
    }
    // set up data for http object - pairs element name => element value
    function set($name, $val) {
        $this->vars[$name] = $val;
    }
    // get element_value according to the element_name
    function get($name, $fix = true) {
        // if element with such name exists
        if(isset($this->vars[$name])) {
            if($fix) {
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        // if element doesnt exist
        return false;
    }
}