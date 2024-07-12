<?php
// Database connection
include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Register form submission
if (isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Register function
    function register($conn, $username, $email, $password, $role)
    {
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
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div class="w-full flex flex-col">
        <a class="text-2xl text-center mt-10 font-semibold text-blue-600" href="./index.php">Back Home</a>

        <h2 class="text-2xl text-center mt-10 font-semibold">Login or Register</h2>

        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>


        <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
            <h2>Register</h2>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="business" <?php if (isset($_POST['role']) && $_POST['role'] == 'business') echo 'elected'; ?>>Business</option>
                <option value="affiliate" <?php if (isset($_POST['role']) && $_POST['role'] == 'affiliate') echo 'elected'; ?>>Affiliate</option>
                <option value="admin" <?php if (isset($_POST['role']) && $_POST['role'] == 'admin') echo 'elected'; ?>>Admin</option>
            </select>

            <input type="submit" name="submit_register" value="Register">
        </form> -->
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                <div>
                    <label for="Username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="name" required value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="Email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="business" <?php if (isset($_POST['role']) && $_POST['role'] == 'business') echo 'elected'; ?>>Business</option>
                        <option value="affiliate" <?php if (isset($_POST['role']) && $_POST['role'] == 'affiliate') echo 'elected'; ?>>Affiliate</option>
                        <option value="admin" <?php if (isset($_POST['role']) && $_POST['role'] == 'admin') echo 'elected'; ?>>Admin</option>
                    </select>
                </div>



                <div>
                    <button type="submit" name="submit_register" value="login" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>
        </div>
    </div>

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