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
        echo 'Received student ID: ' . $studentId . '<br>';
        //echo 'Found student data: ' . print_r($studentData, true) . '<br>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $newClassStream = $_POST['classStream'];

    // SQL to update class stream in database
    $sql = "UPDATE students SET class_stream = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newClassStream, $studentId);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>