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


//$root = realpath($_SERVER["DOCUMENT_ROOT"]);

//TODO change this for when the server is live.
$dbhost = '66.147.244.88';
$dbname = "stonesu0_WDC"; // the name of the database that you are going to use for this project

$dbuser = "stonesu0_csteen"; // the username that you created, or were given, to access your database
$dbpass = "Stee1nhagen@)!^"; // the password that you created, or were given, to access your database
$port = 3306;


$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$port);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
