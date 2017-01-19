<?php

/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/19/2017
 * Time: 12:31
 */

class mysql
{
	// class variables
	var $conn = false; // connection to database server
	var $host = false; // database server name / ip
	var $user = false; // database server user
	var $pass = false; // database server user password
	var $dbname = false; // database server user database
	var $history = array(); // database query log

    // class methods
	// construct
	function __construct($h, $u, $p, $dn){
		$this->host = $h;
		$this->user = $u;
		$this->pass = $p;
		$this->dbname = $dn;
		$this->connect();
	}

	// connect to database server and use database
	function connect(){
		$this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->conn){
			echo 'Probleem andmebaasi ühendamisega'.'<br/>';
			exit;
		}
	}

	// check query execution time
    function getMicroTime() {
	    list($usec, $sec) = explode(" ", microtime());
	    return ((float)$usec + (float)$sec);
    }

	// query to database (returns object)
	function query($sql){
	    $begin = $this->getMicrotime();
		$res = mysqli_query($this->conn, $sql); // query result
		if($res === FALSE){
			echo 'Viga päringus '.'<b>'.$sql.'</b><br/>';
			echo mysqli_error($this->conn).'<br/>';
			exit;
		}
		$time = $this->getMicroTime() - $begin;
		$this->history[] = array(
		    'sql' => $sql,
            'time' => $time
        );
		return $res;
	}

	// query with data results
    function getArray($sql) {
	    $res = $this->query($sql);
	    $data = array();
	    while($record = mysqli_fetch_assoc($res)) {
	        $data[] = $record;
        }
	    if(count($data) == 0) {
	        return false;
        }
        return $data;
    }

    // output query history log array
    function showHistory() {
	    if(count($this->history) > 0) {
	        echo '<hr>';
	        foreach($this->history as $key=>$val) {
	            echo '<li>'.$val['sql'].'<br/>';
	            echo '<strong>'.round($val['time'], 6).'</strong><br/></li>';
            }
        }
    }
}

?>