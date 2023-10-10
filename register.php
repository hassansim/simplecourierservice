<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once "db_connection.php";
require_once "CustomerManagement.php";

$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $reference = $_POST["reference"];
    $sender_address = $_POST["sender_address"];
    $receiver_address = $_POST["receiver_address"];
    $delivery_status = $_POST["delivery_status"];
    $items = $_POST["items"];
    $email = $_POST["email"];
    $nic_number = $_POST["nic_number"];
    $amount = $_POST["amount"];
    $description = $_POST["description"];

    // Create a new instance of the CustomerManagement class with the database connection
    $customerManagement = new CustomerManagement($conn);

    // Register the customer and get the reference number of the newly registered customer
    $reference_number = $customerManagement->registerCustomer($name, $mobile_number, $reference, $sender_address, $receiver_address, $delivery_status, $items, $email, $nic_number, $amount, $description);

    if ($reference_number) {
        // Registration successful, redirect to billing.php with the reference number
        header("Location: billing.php?reference=" . urlencode($reference));
        exit();
    } else {
        // Registration failed
        $error_message = "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fast Courier Pvt Ltd - Registration</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer_status.php">Customer Status</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Customer Registration</h2>
                        <?php if (!empty($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="register.php">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile_number">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="reference">Reference:</label>
                                <input type="text" class="form-control" id="reference" name="reference" required>
                            </div>

                            <div class="form-group">
                                <label for="sender_address">Sender's Address:</label>
                                <input type="text" class="form-control" id="sender_address" name="sender_address"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="receiver_address">Receiver's Address:</label>
                                <input type="text" class="form-control" id="receiver_address" name="receiver_address"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="delivery_status">Delivery Status:</label>
                                <input type="text" class="form-control" id="delivery_status" name="delivery_status"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="items">Items:</label>
                                <input type="text" class="form-control" id="items" name="items" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="nic_number">NIC Number:</label>
                                <input type="text" class="form-control" id="nic_number" name="nic_number" required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="text" class="form-control" id="amount" name="amount" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Parcel Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                    required></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <footer class="bg-primary py-3 mt-5">
        <div class="container text-white text-center">
            &copy;
            <?php echo date("Y"); ?> Fast Courier Pvt Ltd. All rights reserved.
        </div>
    </footer>
</body>

</html>