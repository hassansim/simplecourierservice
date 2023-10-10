<?php
class CustomerManagement
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Function to register a new customer
    public function registerCustomer($name, $mobile_number, $reference, $sender_address, $receiver_address, $delivery_status, $items, $email, $nic_number, $amount, $description)
    {
        $sql = "INSERT INTO customers (name, mobile_number, reference, sender_address, receiver_address, delivery_status, items, email, nic_number, amount, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $name, $mobile_number, $reference, $sender_address, $receiver_address, $delivery_status, $items, $email, $nic_number, $amount, $description);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Function to retrieve customer details by reference number
    public function getCustomerByReference($reference)
    {
        $sql = "SELECT * FROM customers WHERE reference = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $reference);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        $stmt->close();
        return $customer;
    }
}
