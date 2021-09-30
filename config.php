<?php
/*
* Global Variable - Connection | Site Codematra
*/
global $connection;  

/*
* Required Variable | Site Codematra
*/
$hostname = 'localhost';
$dbusername = 'root'; 
$dbpassword = ''; 
$databasename = 'phpdb1'; 

/*
* Connect With Server | Site Codematra
*/
$connection = mysqli_connect($hostname,$dbusername,$dbpassword);
if(!$connection) {
  die('Error in connect with server');   
}  

/*
* Create Database | Site Codematra
*/
$sql = "CREATE DATABASE IF NOT EXISTS $databasename"; 
$output = mysqli_query($connection, $sql); 
if(!$output) {
  die('Error in database creation. ');
}
 
/*
*  Connect with database | Site Codematra
*/
$database = mysqli_select_db($connection, $databasename);  
if(!$database) {
  die('Error in connect with database');
}

/*
* Drop Database | Site Codematra
*/
//$sql = "DROP DATABASE $databasename";
//$output = mysqli_query($connection, $sql); 
//if($output) {
//    die("Database Deleted.<br />");  
//} 