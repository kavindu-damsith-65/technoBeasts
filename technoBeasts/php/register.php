<?php
require 'conn.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address'])) {

// Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

// Validate the password
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        die("Enter Valied Password.(least 1 lowercase and uppercase,must long 8 characters.)");
    }

// Check if the username is already taken
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        die("Username is already taken. Please choose a different username.");
    }

// Insert the user data into the database
    $sql = "INSERT INTO users (username, password, phone, address) VALUES ('$username', '$password', '$phone', '$address')";
  
    
    if ($conn->query($sql) === true) {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        
        $row = $result->fetch_assoc();
        // Set session with the user ID
        session_start();
        $_SESSION['userid'] = $row['userid'];

        // Redirect to the home page
        // header("Location: ../index.php");
        echo "suceed";

    } else {
        // Display the invalid details on the registration page
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php?error=" . urlencode($error_message));

    }

} else {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username is already taken
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['userid'] =$row['userid'];
        echo "suceed";

    } else {
        die("Username or Password Incorrrect.");

    }

}

$conn->close();
