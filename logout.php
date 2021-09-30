<?php
/*
* Simple Logout Page | Site Codematra
*/

include_once('header.php');

// Destory Session
unset($_SESSION);
unset($_SESSION['uid']);
session_destroy();

header("Location: login.php");
die();