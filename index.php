<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Management System</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
        }

        /* Container styles */
        .container {
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
        }

        header h1 {
            margin: 0;
            padding: 0;
            font-size: 1.8rem;
            text-align: center;
        }

        /* Navigation styles */
        nav ul {
            list-style: none;
            text-align: center;
            margin-top: 1rem;
        }

        nav ul li {
            display: inline-block;
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        nav ul li a.active,
        nav ul li a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Main styles */
        main {
            padding: 2rem 0;
            background-color: #fff;
        }

        main h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        main p {
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Login/Register section styles */
        .login-register {
            text-align: center;
            margin-bottom: 3rem;
        }

        .login-register h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .login-register p {
            font-size: 1.1rem;
        }

        .login-register a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .login-register a:hover {
            text-decoration: underline;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }

        footer p {
            margin: 0;
            padding: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            header h1 {
                font-size: 1.5rem;
            }

            nav ul {
                margin-top: 0.5rem;
            }

            nav ul li {
                margin: 0 5px;
            }

            main h1 {
                font-size: 1.8rem;
            }

            main p {
                font-size: 1rem;
            }

            .login-register h2 {
                font-size: 1.3rem;
            }

            .login-register p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <h1>Affiliate Management System</h1>
        <nav>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        <h1>Welcome to the Affiliate Management System</h1>
        <p>This platform allows businesses to manage their affiliate marketing campaigns and affiliates to track their performance and earnings.</p>

        <div class="login-register">
            <h2>Log In or Register</h2>
            <p>Already have an account? <a href="login.php">Log in here</a></p>
            <p>New to the platform? <a href="register.php">Register now</a></p>
        </div>
    </div>
</main>

<footer>
    <div class="container">
        <p>&copy; 2024 Affiliate Management System</p>
    </div>
</footer>

</body>
</html>
