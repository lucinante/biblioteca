<?php
$hostname="127.0.0.1";
$name="root";
$password="";
$database="biblioteca";
$port="3306";

$conn=new mysqli($hostname, $name, $password, $database, $port);

if($conn->connect_error)
    die($conn->connect_error);

?>