<?php
/**
 * Created by PhpStorm.
 * User: adm_gcs
 * Date: 7/1/2016
 * Time: 9:06 AM
 */

$parent = basename(dirname($_SERVER['PHP_SELF']));
if($parent == ""){
    $file = "../wdc_config.txt";
}else{
    $file = "../../wdc_config.txt";
}


$json = "";
if (file_exists($file))
{
    // Note: You should probably do some more checks
    // on the filetype, size, etc.
    $contents = file_get_contents($file);

    // Note: You should probably implement some kind
    // of check on filetype

    $json = $contents;
}

$json = json_decode($json);


//TODO change this for when the server is live.
$dbhost = $json->{'host'};
$dbname = $json->{'database'}; // the name of the database that you are going to use for this project

$dbuser = $json->{'username'}; // the username that you created, or were given, to access your database
$dbpass = $json->{'password'}; // the password that you created, or were given, to access your database
$port = $json->{'port'};

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$port);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$port);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
