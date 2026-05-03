<?php
session_start();
require "db.php";

header("Content-Type: application/json");

if (!isset($_SESSION["user_id"]))
{
    echo json_encode(["success" => false, "message" => "Not logged in"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$user_id = $_SESSION["user_id"];
$title = $data["title"];
$author = $data["author"];
$isbn = $data["isbn"];
$category = $data["genre"];
$description = $data["description"];
$rating = $data["rating"];

$sql = "INSERT INTO Books (user_id, isbn, title, author, category, description, rating)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssi", $user_id, $isbn, $title, $author, $category, $description, $rating);

if ($stmt->execute())
{
    echo json_encode(["success" => true]);
}
else
{
    echo json_encode(["success" => false, "message" => $conn->error]);
}
?>