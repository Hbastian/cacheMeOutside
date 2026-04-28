<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];

    $sql = "INSERT INTO Users (email, password_hash, full_name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $password, $name);

    if ($stmt->execute())
    {
        header("Location: login.php");
        exit();
    }
    else
    {
        $error = "User already exists";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Create Account</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Create</button>
</form>

<p><?php if(isset($error)) echo $error; ?></p>

<a href="login.php">Back to Login</a>

</body>
</html>