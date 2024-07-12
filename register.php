<?php
// Database connection
include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Register form submission
if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Register function
    function register($conn, $username, $email, $password, $role) {
        $query = "INSERT INTO users (username, email, password, role) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $username, $email, password_hash($password, PASSWORD_DEFAULT), $role);
        $stmt->execute();
        return $stmt->affected_rows == 1;
    }
    
    if (register($conn, $username, $email, $password, $role)) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'Registration failed';
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
    <title>Affiliate Management System</title>
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
        input,
        select {
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
        <h2>Login or Register</h2>

        <?php if (isset($error)) {?>
            <p class="error"><?php echo $error;?></p>
        <?php }?>

        
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateForm()">
    <h2>Register</h2>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username'];?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="business" <?php if (isset($_POST['role']) && $_POST['role'] == 'business') echo 'elected';?>>Business</option>
        <option value="affiliate" <?php if (isset($_POST['role']) && $_POST['role'] == 'affiliate') echo 'elected';?>>Affiliate</option>
        <option value="admin" <?php if (isset($_POST['role']) && $_POST['role'] == 'admin') echo 'elected';?>>Admin</option>
    </select>

    <input type="submit" name="submit_register" value="Register">
</form>

</div>

<script>
function validateForm() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var role = document.getElementById('role').value;

    // Simple validation to check if fields are not empty
    if (username.trim() == '' || email.trim() == '' || password.trim() == '' || role.trim() == '') {
        alert('All fields must be filled out');
        return false;
    }

    // You can add more sophisticated validation here (e.g., email format, password strength)

    return true; // Form will submit if all validations pass
}
</script>

</body>
</html>