<?php

// Define the class DB
class DB {
  // Declare the properties for the connection
  public $connnection;

  // Define a constructor method that takes the database parameters as arguments
  public function __construct() {

    //config
    $username = "root";
    $password = ""; //update this when run db on other server
    $dbname = "db";
    $dbhost = "127.0.0.1";

    try {
      // Create a new PDO object with the database parameters
      $this->connnection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
      // Set some attributes for the PDO object
      $this->connnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      // Throw an exception if something goes wrong with the connection
      throw new Exception($e->getMessage());
    }
  }

  // Define some methods for querying and manipulating data from the database

}

?>