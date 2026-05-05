<?php
$host = "localhost";
$user = "root";
$pass = "121903";
$db = "CMO";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>