<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("../includes/config.php"); 

class postgresDatabase
{
   private $connection;
  function __construct()
  {
 
  }
  
  public function open_connection()
  {
    $this->connection = pg_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  }
  
  public function close_connection()
  {
    if(isset($this->$connection))
    {
    pg_close($this->connection);
    }
  }
  
  
  
  
  public function query($result)
  {
    $result = pg_query($this->connection, $result);
    return $result;
  }
  
}

class MySQLDatabase {
  
  private $connection;
  
  function __construct() {
    $this->open_connection();
  }
  // open a connection
    public function open_connection()
    {
     $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
      die("Database connection failed: " . 
           mysqli_connect_error() . 
           " (" . mysqli_connect_errno() . ")"
      );
    }
   
    }
    
    public function close_connection() {
      if(isset($this->connection)) {
        mysqli_close($this->connection);
        unset($this->connection);
      }
    }
    
    public function query($mysql)
    {
      
    $result = mysqli_query($this->connection, $mysql);
    $this->confirm_query($result);
    return $result;
        
    }
    
    private function confirm_query($result)
    {
      if (!$result) {
      die("database query failed"); 
     }  
    }
    
    public function mysql_prep($string) {
    

		
		$escaped_string = mysqli_real_escape_string($this->connection, $string);
		return $escaped_string;

    }
    
    public function fetch_array($result_set)
    {
      return mysqli_fetch_array($result_set);
    }
    
    public function num_rows($result_set)
    {
     return mysqli_num_rows($result_set); 
    }
    
    public function insert_id() {
      return mysqli_insert_id($this->connection);
    }
    
    public function affected_rows() {
      return mysqli_affected_rows($this->connection);
    }
    
  
}

// sqlite class

$database = new MySQLDatabase();
$database->open_connection();

?>