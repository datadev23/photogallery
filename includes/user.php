<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// there is a depdency for the User class using
require_once('database.php');

class User {
 
  public static function find_all() {
    global $database;
    $result_set = $database->query("SELECT * FROM users");
  }
  // find default value of first element
  public static function find_by_id($id=0)
  {
    global $database;
    $result_set = $database->query("SELECT * FROM users WHERE id= {$id}");
    $found = $database->fetch_array($result_set);
    return $found;
  }
 
}