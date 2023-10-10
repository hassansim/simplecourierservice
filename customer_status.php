<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once "db_connection.php";
require_once "CustomerManagement.php";

$customer_data = null;
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered reference number from the form
    $reference = $_POST["reference"];

    // Create a new instance of the CustomerManagement class with the database connection
    $customerManagement = new CustomerManagement($conn);

    // Retrieve customer details based on the reference number
    $customer_data = $customerManagement->getCustomerByReference($reference);

    if (!$customer_data) {
        $error_message = "Customer not found with the provided reference number.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fast Courier Pvt Ltd - Customer Status</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="customer_status.php">Customer Status</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container mt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Customer Status</h2>
                        <?php if (!empty($error_message)) { ?>
                            <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
                        <?php } ?>
                        <form method="post" action="customer_status.php">
                            <div class="form-group">
                                <label for="reference">Enter Reference Number:</label>
                                <input type="text" class="form-control" id="reference" name="reference" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Check Status</button>
                            </div>
                        </form>

                        <?php if ($customer_data) { ?>
    <div class="mt-4">
        <h4>Customer Details:</h4>
        <p><strong>Name:</strong> <?php echo $customer_data['name']; ?></p>
        <p><strong>Mobile Number:</strong> <?php echo $customer_data['mobile_number']; ?></p>
        <p><strong>Reference Number:</strong> <?php echo $customer_data['reference']; ?></p>
        <p><strong>Sender's Address:</strong> <?php echo $customer_data['sender_address']; ?></p>
        <p><strong>Receiver's Address:</strong> <?php echo $customer_data['receiver_address']; ?></p>
        <p><strong>Delivery Status:</strong> <?php echo $customer_data['delivery_status']; ?></p>
        <p><strong>Items:</strong> <?php echo $customer_data['items']; ?></p>
        <p><strong>Email:</strong> <?php echo $customer_data['email']; ?></p>
        <p><strong>NIC Number:</strong> <?php echo $customer_data['nic_number']; ?></p>
        <p><strong>Amount:</strong> <?php echo $customer_data['amount']; ?></p>
        <p><strong>Description:</strong> <?php echo $customer_data['description']; ?></p>
    </div>
<?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary py-3 mt-5">
        <div class="container text-white text-center">
            &copy; <?php echo date("Y"); ?> Fast Courier Pvt Ltd. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
