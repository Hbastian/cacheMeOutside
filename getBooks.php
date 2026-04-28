<?php
session_start();
require "db.php";

header("Content-Type: application/json");

if (!isset($_SESSION["user"]))
{
    echo json_encode([]);
    exit();
}

$sql = "SELECT isbn, title, author, category AS genre, description, rating FROM Books ORDER BY book_id DESC";
$result = $conn->query($sql);

$books = [];

while ($row = $result->fetch_assoc())
{
    $books[] = $row;
}

echo json_encode($books);
?>