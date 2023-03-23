<?php
// include the configuration file
include("../config/configuration.php");

/* 
 * This class provides a database connection using the details in the 
 * configuration file. 
 */
class Connection
{
	// define class properties
	public $host;
	public $user;
	public $pass;
	public $dbname;
	public $con;
	public $message;
	
	// constructor method, calls db_connect method to establish connection
	public function __construct()
	{
		return $this->db_connect();
	}
	
	// method to connect to database using details from configuration file
	public function db_connect()
	{
		// set class properties to values from configuration file
		$this->host = DBHOST;
		$this->user = DBUSER;
		$this->pass = DBPASS; 
		$this->dbname = DBNAME; 
		
		// create a new mysqli object to establish database connection
		$this->con = new mysqli($this->host,$this->user,$this->pass,$this->dbname) or mysqli_error();
		
		// check if connection was successful and set message accordingly
		if(!$this->con)
		{
			 $this->message = "Some problem with connection...";
		}
		else
		{
			 $this->message = "Connected Succesfully...";
		}
	}
}
?>