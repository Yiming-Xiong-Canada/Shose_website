<?php

function OpenCon()
{

$server = "localhost:3306";
$username = "root";
$password = "";
$dbname = "shoes";

$conn = new mysqli($server, $username, $password, $dbname) or die("Connect failed: %s\n".$conn->error);

return $conn;

}

function CloseCon($conn)
{
    $conn -> close();
}

?>