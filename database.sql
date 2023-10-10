-- Create the database
-- CREATE DATABASE fastcourier;
-- USE fastcourier;

-- Create the 'employees' table
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert dummy data into the 'employees' table
INSERT INTO employees (username, password) VALUES
    ('john_doe', 'password123'),
    ('jane_smith', 'securepass');

-- Create the 'customers' table
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    reference VARCHAR(20) NOT NULL,
    sender_address VARCHAR(255) NOT NULL,
    receiver_address VARCHAR(255) NOT NULL,
    delivery_status VARCHAR(50) NOT NULL,
    items TEXT NOT NULL,
    email VARCHAR(100) NOT NULL,
    nic_number VARCHAR(20) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL
);

-- Insert dummy data into the 'customers' table
INSERT INTO customers (name, mobile_number, reference, sender_address, receiver_address, delivery_status, items, email, nic_number, amount, description) VALUES
    ('John Smith', '9876543210', 'REF001', '123 Main St, City', '456 Park Ave, Town', 'Delivered', 'Electronics', 'john@example.com', '123456789', 250.00, 'Small package'),
    ('Alice Johnson', '9876543211', 'REF002', '789 Center Rd, Village', '567 Hill Rd, Country', 'In Transit', 'Clothes', 'alice@example.com', '987654321', 150.00, 'Medium-sized box'),
    ('Bob Anderson', '9876543212', 'REF003', '111 Elm St, Suburb', '222 Oak Rd, County', 'Not Delivered', 'Books', 'bob@example.com', '654321987', 80.00, 'Book shipment');

-- Create the 'parcels' table
CREATE TABLE parcels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_description VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    reference_number VARCHAR(20) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

-- Insert dummy data into the 'parcels' table
INSERT INTO parcels (customer_id, product_description, price, reference_number) VALUES
    (1, 'Smartphone', 500.00, 'REF001'),
    (2, 'Shoes', 80.00, 'REF002'),
    (3, 'Notebook', 30.00, 'REF003');
