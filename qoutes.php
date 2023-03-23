<?php

// Include the connection.php file that establishes the database connection
include("../includes/connection.php");

// Create a class called "quotes" that extends the "Connection" class
class quotes extends Connection
{

  // Constructor method that calls the parent constructor
  public function __construct()
 {
	  parent::__construct();
 }
 

  // Create method that takes in data to be inserted into the database
  public function create($data)
{
  // Execute an SQL query with the given data
  $insert = $this->con->query($data) or die();

  // If the query was successful, return the result
  if($insert)
  {
    return $insert;
  }
  else 
  {
    // If the query failed, display an error message
    echo "Query failed...";
  }
}
 
 // Read method that takes in data to be selected from the database
 public function read($data)
{
  // Execute an SQL query with the given data
  $view = $this->con->query($data) or die();

  // If the query returned rows, return the result
  if ($view->num_rows > 0)
  {
    return $view;
  }
  else
  {
	 return $view;
  }
}

  // Update method that takes in data to be updated in the database
  public function update($data)
{
  // Execute an SQL query with the given data
  $update = $this->con->query($data) or die();

  // If the query was successful, return the result
  if($update)
  {
   return $update;
  }
  else 
  {
    // If the query failed, display an error message
    echo "Query failed...";
  }
}

 // Delete method that takes in data to be deleted from the database
 public function deletes($data)
{
  // Execute an SQL query with the given data
  $delete = $this->con->query($data) or die();

  // If the query was successful, return the result
  if($delete)
  {
    return $delete;
  }
  else
  {
    // If the query failed, display an error message
    echo "Query failed...";
  }
}
}

?>

