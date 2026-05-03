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
        $error = "That account already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Cache Me Outside</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

<div class="auth-shell">
    <div class="auth-brand">
        <p class="eyebrow">Start reading smarter</p>
        <h1>Create Profile</h1>
        <p>Build your own personal book cache and keep your collection organized.</p>
    </div>

    <div class="auth-card">
        <h2>Create Account</h2>
        <p class="auth-subtitle">Join Cache Me Outside</p>

        <?php if(isset($error)): ?>
            <div class="auth-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="auth-field">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Your name" required>
            </div>

            <div class="auth-field">
                <label>Email</label>
                <input type="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="auth-field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create a password" required>
            </div>

            <button class="auth-btn" type="submit">Create Account</button>
        </form>

        <p class="auth-footer">
            Already have an account?
            <a href="login.php">Login</a>
        </p>
    </div>
</div>

</body>
</html>