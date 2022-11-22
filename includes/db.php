<?php
define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'u890710511_rcss');
define('DB_PASSWORD', 'Rogationiststudentservicessystem22');
define('DB_NAME', 'u890710511_rcss');
 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


$a = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else if($a === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>