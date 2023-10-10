<?php
class Customer {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function registerCustomer($data) {
        // Prepare the query to prevent SQL injection
        $sql = "INSERT INTO customers (name, mobile_number, reference, sender_address, receiver_address, 
                delivery_status, items, email, nic_number, amount, description)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);

        // Check if the statement was prepared successfully
        if ($stmt) {
            // Bind the parameters to the statement
            $stmt->bind_param(
                "sssssssssss",
                $data['name'],
                $data['mobile_number'],
                $data['reference'],
                $data['sender_address'],
                $data['receiver_address'],
                $data['delivery_status'],
                $data['items'],
                $data['email'],
                $data['nic_number'],
                $data['amount'],
                $data['description']
            );

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Registration successful
            } else {
                return false; // Registration failed
            }

            // Close the statement
            $stmt->close();
        } else {
            return false; // Statement preparation failed
        }
    }
}
?>
