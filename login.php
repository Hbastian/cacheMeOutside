<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM Users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password_hash"]))
    {
        $_SESSION["user"] = $user["email"];
        $_SESSION["user_id"] = $user["user_id"];
        header("Location: index.php");
        exit();
    }
    else
    {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Cache Me Outside</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

<div class="auth-shell">
    <div class="auth-brand">
        <p class="eyebrow">Welcome back</p>
        <h1>Cache Me Outside</h1>
        <p>Track your books, ratings, and favorites in one clean place.</p>
    </div>

    <div class="auth-card">
        <h2>Login</h2>
        <p class="auth-subtitle">Sign in to your library</p>

        <?php if(isset($error)): ?>
            <div class="auth-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="auth-field">
                <label>Email</label>
                <input type="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="auth-field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <button class="auth-btn" type="submit">Login</button>
        </form>

        <p class="auth-footer">
            No account yet?
            <a href="createProfile.php">Create one</a>
        </p>
    </div>
</div>

</body>
</html>