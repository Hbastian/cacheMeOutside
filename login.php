<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | CacheMeOutside</title>
    <link rel="stylesheet" href="login-style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="page-shell">
        <header class="top-bar">
            <a href="index.php" class="brand">CacheMeOutside</a>
        </header>

        <main class="login-wrapper">
            <section class="login-card">
                <div class="login-glow"></div>

                <p class="eyebrow">welcome back</p>
                <h1>sign in to your library</h1>
                <p class="subtext">
                    track your books, ratings, and reviews in one place
                </p>

                <form class="login-form" action="#" method="post">
                    <div class="input-group">
                        <label for="email">email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            required
                        />
                    </div>

                    <div class="input-group">
                        <label for="password">password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="enter your password"
                            required
                        />
                    </div>

                    <div class="login-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" />
                            <span>remember me</span>
                        </label>

                        <a href="#" class="forgot-link">forgot password?</a>
                    </div>

                    <button type="submit" class="login-btn">log in</button>
                </form>

                <div class="divider">
                    <span>or</span>
                </div>

                <a href="create-profile.php" class="secondary-btn">create account</a>
            </section>
        </main>
    </div>
</body>
</html>