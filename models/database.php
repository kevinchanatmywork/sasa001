<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define('DB_HOST','localhost:8889');
define('DB_USER','root');
define('DB_PW','root');
define('DB_SCHEMA','sasa_db');



class DBModel{   
	
	static $me;
	private $auto_commit = true;
	private $con = null;
	
	public function __construct(){
		
	}
	public static function getInstance(){
		if (DBModel::$me==null){
			DBModel::$me = new DBModel();
		}
		return DBModel::$me;
	}

	function startTransaction(){
		//echo "START transaction<br/>";
		$this->auto_commit = false;
		$link = $this->connectDB();
		mysqli_autocommit($link,false);
	}

	function commit(){
		mysqli_commit($this->con);
		$this->auto_commit = true;
		$this->disconnectDB();
	}

	function rollback(){
		mysqli_rollback($this->con);
		$this->auto_commit = true;
		$this->disconnectDB();
	}

	function connectDB(){
		$this->con = mysqli_connect(DB_HOST,DB_USER,DB_PW,DB_SCHEMA);   
		if (!$this->con) {
			echo "Connect fail.";
			die("Can’t connect to MySQL Server. Errorcode: ".mysqli_connect_error());
		} 
		mysqli_query($this->con, "SET NAMES UTF8");
		
		return $this->con;
	}
	function disconnectDB(){
		mysqli_close($this->con);
	}
	function execBySQL($sql){
		if ($this->auto_commit) $link = $this->connectDB();
		else $link = $this->con;
		if (!$stmt = mysqli_prepare($link, $sql)) {
			$this->disconnectDB();
			die('Please check your sql statement : unable to prepare: '.$sql);
		}
		$ok = mysqli_stmt_execute($stmt);
		$error_desc =  mysqli_error($link);
		if ($error_desc!=null) echo $error_desc;
		if ($this->auto_commit) $this->disconnectDB();
		return $ok;
	}
	
	function selectBySQL($sql) {
	
		if ($this->auto_commit) $link = $this->connectDB();
		else $link = $this->con;
		if (!$stmt = mysqli_prepare($link, $sql)) {
			$this->disconnectDB();
			die('Please check your sql statement : unable to prepare'.$sql);
		}

		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_result_metadata($stmt);

		$fields = array();
		while ($field = mysqli_fetch_field($result)) {
			$name = $field->name;
			$fields[$name] = &$$name;
		}
		array_unshift($fields, $stmt);
   
		call_user_func_array('mysqli_stmt_bind_result', $fields);
		array_shift($fields);
		$results = array();
		while (mysqli_stmt_fetch($stmt)) {
			$temp = array();
			foreach($fields as $key => $val) {
				$temp[$key] = stripslashes($val); 
			}
			$results[] = $temp;
		}
		mysqli_free_result($result);
		mysqli_stmt_close($stmt);
		if ($this->auto_commit) $this->disconnectDB();
   
		return $results;
	} 
	
	function sanitize_strings($input_strs){
	    
	    $strs = $input_strs;
	    
	    if (!is_array($strs)){
	        $strs = array($strs);
	    }
	    
	    $sanitized_strs = array();
	    
		if ($this->auto_commit) $link = $this->connectDB();
		else $link = $this->con;
	    
		foreach ($strs as $index=>$str){
		    $sanitized_strs[$index] = mysqli_real_escape_string($link, $str);
		}

		if (!is_array($input_strs)){
		    reset($sanitized_strs);
		    return current($sanitized_strs);
		}
		
		return $sanitized_strs;
	    
	}
	
	function prepare($sql){

        $link = $this->con;
        return mysqli_prepare($link, $sql); 
        
	}
	
	function getError(){
	    return mysqli_error($this->con);
	}
	
	function getInsertId(){
	    return mysqli_insert_id($this->con);
	}
}