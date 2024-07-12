<?php
session_start();
include 'db.php'; // Assuming this file initializes $conn for database connection

// Login function
function login($conn, $username, $password, $role) {
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['password']) && $user['role'] === $role) {
            // Login successful, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Initialize error variable
$error = '';

// Login form submission
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Retrieve selected role from form

    if (login($conn, $username, $password, $role)) {
        // Redirect based on user role
        if ($role === 'business') {
            header('Location: business_dashboard.php');
        } elseif ($role === 'affiliate') {
            header('Location: affiliate_dashboard.php');
        } else {
            // Default redirect if role is not defined
            header('Location: index.php'); // Adjust as per your application's logic
        }
        exit;
    } else {
        $error = 'Invalid username, password, or role';
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link your CSS file here -->
    <style>
        /* Additional styles specific to this page can be added here */
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label,
        input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
            <h2>Login</h2>

            <?php if (!empty($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="business">Business</option>
                <option value="affiliate">Affiliate</option>
            </select>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Simple validation to check if fields are not empty
            if (username.trim() == '' || password.trim() == '') {
                alert('Please enter both username and password');
                return false;
            }

            return true; // Form will submit if all validations pass
        }
    </script>

</body>

</html>