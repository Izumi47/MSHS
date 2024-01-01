<?php
include("db_connection.php");

// Get user input (id and password)
$id = $_POST['id'];
$password = $_POST['password'];

// Query the database to retrieve user data
$query = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $user_data = $result->fetch_assoc();
    $hashed_password = $user_data['password'];
    $position = $user_data['position'];

    // Verify the password using password_verify
    if (password_verify($password, $hashed_password)) {
        // Password is correct, set session variables based on user's position and redirect accordingly
        session_start();
        $_SESSION['id'] = $id;

        if ($position == 'Admin') {
            header("Location: ../admins-dashboard.php"); // Redirect to the admin dashboard
        } elseif ($position == 'Student') {
            header("Location: ../students-dashboard.php"); // Redirect to the student dashboard
        } elseif ($position == 'Teacher') {
            header("Location: ../teachers-dashboard.php"); // Redirect to the student dashboard
        } else {
            // Handle other positions or cases if needed
            echo "Invalid user position";
        }
    } else {
        // Password is incorrect, show an error message
        echo "Invalid login credentials";
    }
} else {
    // User does not exist, show an error message
    echo "Invalid login credentials";
}

$conn->close();
?>
