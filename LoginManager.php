<?php
class LoginManager
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function login($username, $password)
    {
        // Prepare the query to prevent SQL injection
        $sql = "SELECT * FROM employees WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        // Get the result of the query
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the employee record
            $row = $result->fetch_assoc();

            // Verify the password
            if ($password === $row['password']) {
                // Password matches, login successful
                return true;
            }
        }

        return false; // Invalid username or password
    }
}
?>