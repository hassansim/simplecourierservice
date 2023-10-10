<!DOCTYPE html>
<html>

<head>
    <title>Fast Courier Pvt Ltd - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    <!-- Service Section -->
    <div class="service-section">
        <div class="container text-center">
            <h2>Our Services</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <i class="fas fa-truck service-icon"></i>
                    <h4>Courier Delivery</h4>
                    <p>Fast and reliable courier delivery service to anywhere in the nation.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-clock service-icon"></i>
                    <h4>Express Delivery</h4>
                    <p>Choose our express delivery option for urgent shipments.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-globe service-icon"></i>
                    <h4>Wide Coverage</h4>
                    <p>We have a wide network to deliver your parcels across the country.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="about-section">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>Fast Courier Pvt Ltd is a leading courier service company specialized in delivering parcels all over the
                nation. With our fast and reliable delivery services, we ensure that your parcels reach their
                destination on time and in perfect condition.</p>
            <p>Our dedicated team of professionals is committed to providing the best customer experience, and we strive
                to exceed your expectations with every delivery.</p>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="contact-section">
        <div class="container text-center">
            <h2>Contact Us</h2>
            <p>If you have any queries or need assistance, please feel free to contact us.</p>
            <p><i class="fas fa-phone-alt"></i> +94-72-456-7890</p>
            <p><i class="fab fa-whatsapp"></i> +94-72-456-7890</p>
            <p><i class="fab fa-facebook-f"></i> fastcourier</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary py-3">
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