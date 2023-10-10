<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once "db_connection.php";
require_once "LoginManager.php";

$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Create a new instance of the LoginManager class with the database connection
    $loginManager = new LoginManager($conn);

    // Attempt to login
    if ($loginManager->login($username, $password)) {
        // Password matches, login successful

        // Redirect to the Customer Status Page
        header("Location: customer_status.php");
        exit();
    } else {
        // Invalid username or password
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fast Courier Pvt Ltd - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .header {
            background-color: #17a2b8;
            color: white;
            padding: 20px 0;
        }

        .about-section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header text-center">
        <h1>Fast Courier Pvt Ltd</h1>
    </div>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer_status.php">Customer Status</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 pb-2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login</h2>
                        <?php if (!empty($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="login.php">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-primary py-3 mt-5">
        <div class="container text-white text-center">
            &copy;
            <?php echo date("Y"); ?> Fast Courier Pvt Ltd. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>