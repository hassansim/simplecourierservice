<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once "db_connection.php";
require_once "ParcelManagement.php";

$parcel_data = null;
$error_message = '';

// Check if the reference number is provided as a query parameter
if (isset($_GET["reference"])) {
    // Get the reference number from the query parameter
    $reference = $_GET["reference"];

    // Create a new instance of the ParcelManagement class with the database connection
    $parcelManagement = new ParcelManagement($conn);

    // Retrieve parcel details based on the reference number
    $parcel_data = $parcelManagement->getParcelByReference($reference);

    if (!$parcel_data) {
        $error_message = "Parcel not found with the provided reference number.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fast Courier Pvt Ltd - Billing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card {
            border: 2px solid #17a2b8;
            border-radius: 5px;
        }
        .card-header {
            background-color: #17a2b8;
            color: white;
        }
        .card-title {
            margin-bottom: 0;
        }
        .bill-details p {
            margin-bottom: 5px;
        }
    </style>
    <!-- Custom CSS for printing -->
<style>
    @media print {
        header,
        nav,
        .btn,
        footer {
            display: none;
        }
        body {
            background-color: white;
        }
        .card {
            border: none;
            box-shadow: none;
        }
        .card-body {
            padding: 0;
        }
        .bill-details {
            padding: 20px;
            border: 2px solid #17a2b8;
            border-radius: 5px;
        }
        .bill-details p {
            margin-bottom: 10px;
        }
    }
</style>

<style>
        .header {
            background-color: #17a2b8;
            color: white;
            padding: 20px 0;
        }

        .service-section {
            padding: 50px 0;
        }

        .service-icon {
            font-size: 40px;
            color: #17a2b8;
            margin-bottom: 20px;
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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
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

    <!-- Content Section -->
<div class="container mt-5 pb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">Billing</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty($error_message)) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
                    <?php } ?>
                    <?php if ($parcel_data) { ?>
                        <div class="bill-details">
                            <p><strong>Customer Name:</strong> <?php echo $parcel_data['name']; ?></p>
                            <p><strong>Address:</strong> <?php echo $parcel_data['receiver_address']; ?></p>
                            <p><strong>Product Description:</strong> <?php echo $parcel_data['description']; ?></p>
                            <p><strong>Price:</strong> <?php echo $parcel_data['amount']; ?></p>
                            <p><strong>Reference Number:</strong> <?php echo $parcel_data['reference']; ?></p>

                            <!-- Print button -->
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-success" onclick="window.print()">Print Bill</button>
                            </div>
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
