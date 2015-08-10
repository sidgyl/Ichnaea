<?php
class DBconnection{
	private $hostname;       // Name of the PC hosting the site or its IP address
	private $mysqlUsername;  // Username to connect to Mysql
	private $mysqlPwd;		 // password to connect Mysql 
	private $dbname;	     // Name of the Daban
	public  $db;			 // Dabase object returned from when...
	
	// function __construct($hostname="129.107.132.27", $mysqlUsername="root", $mysqltPwd="Laelaps", $dbname="ichnaea"){
	function __construct($hostname="localhost", $mysqlUsername="root", $mysqltPwd="", $dbname="ichnaea"){
		
		$this->hostname = $hostname;
		$this->mysqlUsername = $mysqlUsername;
		$this->mysqlPwd = $mysqltPwd;
		$this->dbname = $dbname;
		$this->db = null;
		
	}
	
	// public function ConnectToDB($hostname, $mysqlUsername, $mysqlPwd, $dbname){
	public function ConnectToDB(){
		
		try{
			$this->db = new PDO('mysql:host='.$this->hostname.';dbname='.$this->dbname.';charset=utf8',$this->mysqlUsername , $this->mysqlPwd);
		}
		catch (Exception $e)
		{
			die('Error connecting to the  database ' . $this->dbname);//e->getMessage()
		}
	}
	
	public function closeConnection(){
		$this->db = null;
	}

}