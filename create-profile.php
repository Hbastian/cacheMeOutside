<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account | CacheMeOutside</title>
    <link rel="stylesheet" href="style-create-profile.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="page-shell">
        <header class="top-bar">
            <a href="login.php" class="brand">← back to login</a>
        </header>

        <main class="signup-wrapper">
            <section class="signup-card">
                <div class="signup-glow"></div>

                <p class="eyebrow">join us</p>
                <h1>create your account</h1>
                <p class="subtext">
                    start tracking your books and building your library
                </p>

                <form class="signup-form" action="#" method="post">

                    <div class="input-group">
                        <label for="username">username</label>
                        <input type="text" id="username" name="username" placeholder="choose a username" required />
                    </div>

                    <div class="input-group">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required />
                    </div>

                    <div class="input-group">
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" placeholder="create a password" required />
                    </div>

                    <div class="input-group">
                        <label for="confirm">confirm password</label>
                        <input type="password" id="confirm" name="confirm" placeholder="confirm password" required />
                    </div>

                    <button type="submit" class="signup-btn">create account</button>
                </form>

                <div class="divider">
                    <span>already have an account?</span>
                </div>

                <a href="login.php" class="secondary-btn">log in instead</a>
            </section>
        </main>
    </div>
</body>
</html>