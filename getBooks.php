<?php
session_start();
require "db.php";

header("Content-Type: application/json");

if (!isset($_SESSION["user_id"]))
{
    echo json_encode([]);
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT isbn, title, author, category AS genre, description, rating
        FROM Books
        WHERE user_id = ?
        ORDER BY book_id DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

$books = [];

while ($row = $result->fetch_assoc())
{
    $books[] = $row;
}

echo json_encode($books);
?>