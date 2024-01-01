<?php
include 'db_connection.php';

// Initialize $studentData as an empty array
$studentData = [];

// Get the student ID from the URL
$studentId = isset($_GET['id']) ? $_GET['id'] : '';

if ($studentId) {
    // SQL query to retrieve data for the specific student
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the student data
        $studentData = $result->fetch_assoc();
    }
}

$conn->close();
?>
