<?php

/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/12/2017
 * Time: 12:27
 */
// if TMPL_DIR is not defined
if(!defined('TMPL_DIR')) {
    // define this constant and use it in class template
    define('TMPL_DIR', '../tmpl/');
}
class template
{
    // class variables
    var $file = ''; // template file name
    var $content = false; // template content - now is empty
    var $vars = array(); // table for real values of html template output

    // class methods
    //constructor
    function __construct($f) {
        $this->file = $f;
        $this->loadFile();
    }

    function loadFile() {
        $f = $this->file; // use file name variable
        // if problems occur with tmpl directory
        if(!is_dir(TMPL_DIR)) {
            echo 'Directory '.TMPL_DIR.' not found.<br/>';
            exit;
        }
        // if we are in tmpl directory, $this->file is 'tmpl/file.html'
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        // set path to template file: tmpl/file.html, $this->file is 'file.html'
        $f = TMPL_DIR.$this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        // set only file name, $this->file is 'file'
        $f = TMPL_DIR.$this->file.'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            $this->readFile($f);
        }
        if($this->content === false) {
            echo 'Could not read file '.$this->file.'.<br/>';
            exit;
        }
    }

    // read the file
    function readFile($f) {
        $this->content = file_get_contents($f);
    }

    // set up html elements and their real values
    // $name - template element name
    // $val - real element name
    function set($name, $val) {
        $this->vars[$name] = $val;
    }

    // parse template content and replace template table names by
    // template table real values
    function parse() {
        $str = $this->content;
        foreach ($this->vars as $name=>$val) {
            $str = str_replace('{'.$name.'}', $val, $str);
        }
        // return template content with real values
        return $str;
    }
}