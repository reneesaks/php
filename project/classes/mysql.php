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

	// query to database (returns object)
	function query($sql){
		$res = mysqli_query($this->conn, $sql); // query result
		if($res === FALSE){
			echo 'Viga päringus '.'<b>'.$sql.'</b><br/>';
			echo mysqli_error($this->conn).'<br/>';
			exit;
		}
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
}

?>