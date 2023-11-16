<?php
error_reporting(0);

$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'praktikumdimas';
 
$msg = "";
 
$db = mysqli_connect($server, $username, $password, $db_name);

if(!$db){
    die("gagal terhubung");
}
?>