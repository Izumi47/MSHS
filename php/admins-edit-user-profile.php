<?php
include("db_connection.php");

// Initialize $userData as an empty array
$userData = [];

// Get the user ID from the URL
$userId = isset($_GET['id']) ? $_GET['id'] : '';

if ($userId) {
    // SQL query to retrieve data for the specific user
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $userData = $result->fetch_assoc();
        echo 'Received user ID: ' . $userId . '<br>';
        //echo 'Found user data: ' . print_r($userData, true) . '<br>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract user information from the POST request
    $userId = $_POST["userId"]; // Retrieve user ID from form data
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    // Append "@mshs.com" to the email input
    $email .= "@mshs.com";

    // Update the user data in the database
    $updateQuery = "UPDATE users SET name = ?, contact = ?, email = ?, birthdate = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);

    if ($stmt) {
        $stmt->bind_param("ssssi", $name, $contact, $email, $birthdate, $userId);

        if ($stmt->execute()) {
            // user record was successfully updated
            echo 'User record updated successfully!';
        } else {
            // user record update failed, show an error message
            echo 'User record update failed: ' . mysqli_error($conn);
        }
        
        $stmt->close();
    } else {
        // Statement preparation failed
        echo 'Statement preparation failed: ' . mysqli_error($conn);
    }
} else {
    // Invalid request method
    echo 'Invalid request method.';
}

// Close the database connection
$conn->close();
?>
