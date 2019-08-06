<?php

/*
 * Global Variable - Connection 
 */

global $connection;  

/*
 * Required Variable 
 */

$hostname = 'localhost';
$dbusername = 'root'; 
$dbpassword = ''; 
$databasename = 'website_str'; 


/*
 * Connect With Server
 */

$connection = mysqli_connect($hostname,$dbusername,$dbpassword);
if(!$connection) {
    die('Error in connect with server');   
}  

/*
 * Create Database
 */
//$sql = "CREATE DATABASE $databasename";
$sql = "CREATE DATABASE IF NOT EXISTS $databasename"; 
$output = mysqli_query($connection, $sql); 
if(!$output) {
    die('Error in database creation. ');
}

/*
 * Drop Database
 */
//$sql = "DROP DATABASE $databasename";
//$output = mysqli_query($connection, $sql); 
//if($output) {
//    die("Database Deleted.<br />");  
//} 
 

/*
 *  Connect with database
 */

$database = mysqli_select_db($connection, $databasename);  
if(!$database) {
    die('Error in connect with database');
}  