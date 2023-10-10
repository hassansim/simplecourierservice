<?php
class ParcelManagement
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getParcelByReference($reference)
    {
        // Prepare the query to prevent SQL injection
        $sql = "SELECT * FROM customers WHERE reference = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $reference);
        $stmt->execute();

        // Get the result of the query
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the parcel record
            return $result->fetch_assoc();
        }

        return null; // Parcel not found
    }
}
?>