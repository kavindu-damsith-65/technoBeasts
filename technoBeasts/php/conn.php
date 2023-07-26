<?php
// Assuming you have established a database connection
// Replace 'your_host', 'your_username', 'your_password', and 'technobeasts' with your own values
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'technobeasts';

$host = 'sql105.infinityfree.com';
$username = 'if0_34666721';
$password = '46KdyI7l7gf';
$database = 'if0_34666721_technobeasts';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>