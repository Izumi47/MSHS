<?php
include 'db_connection.php';

// Initialize $userData as an empty array
$userData = [];

// Get the user ID from the URL
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : '';

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
    }
}

$conn->close();
?>
