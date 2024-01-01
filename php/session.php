<?php
session_start();
if (!isset($_SESSION["email"])) {
    // User is not logged in; you can redirect them to the login page or take appropriate action
    header("Location: login.php"); // Redirect to the login page
    exit(); // Stop further execution
}

// After retrieving user data from the database
$_SESSION["email"] = $email;
$_SESSION["username"] = $username;
$_SESSION["position"] = $position;

// Fetch and set the user's picture from the database
$query = "SELECT picture FROM users WHERE email = '$email'";
$result = $conn->query($query);
$user_data = $result->fetch_assoc();
$_SESSION["picture"] = $user_data["picture"];
?>