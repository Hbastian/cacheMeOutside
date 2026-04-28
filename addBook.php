<?php
session_start();
require "db.php";

header("Content-Type: application/json");

if (!isset($_SESSION["user"]))
{
    echo json_encode(["success" => false, "message" => "Not logged in"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$title = $data["title"];
$author = $data["author"];
$isbn = $data["isbn"];
$category = $data["genre"];
$description = $data["description"];
$rating = $data["rating"];

$sql = "INSERT INTO Books (isbn, title, author, category, description, rating)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $isbn, $title, $author, $category, $description, $rating);

if ($stmt->execute())
{
    echo json_encode(["success" => true]);
}
else
{
    echo json_encode(["success" => false, "message" => $conn->error]);
}
?>