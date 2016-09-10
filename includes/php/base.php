<?php
/**
 * Created by PhpStorm.
 * User: adm_gcs
 * Date: 7/1/2016
 * Time: 9:06 AM
 */
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
session_start();


$root = realpath($_SERVER["DOCUMENT_ROOT"]);
if(strpos($root,'public_html') !== false){
    $dbhost = 'localhost';
}else{
    //TODO
    $dbhost = ""; // this will ususally be 'localhost', but can sometimes differ
}
//TODO
$dbname = "WDC"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = "stee1nhagen"; // the password that you created, or were given, to access your database



//TODO might need to add port
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
