<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract user information from the POST request
    $studentId = $_POST["userId"]; // Retrieve user ID from form data
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $classroom = $_POST["classroom"];
    $address = $_POST["address"];
    $interests = isset($_POST["interests"]) ? implode(";", $_POST["interests"]) : "";
    $ambition = $_POST["ambition"];

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    // Append "@mshs.com" to the email input
    $email .= "@mshs.com";

    // Update the student data in the database
    $updateQuery = "UPDATE students SET name = ?, contact = ?, email = ?, classroom = ?, address = ?, interests = ?, ambition = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);

    if ($stmt) {
        $stmt->bind_param("sssssssi", $name, $contact, $email, $classroom, $address, $interests, $ambition, $studentId);

        if ($stmt->execute()) {
            // Student record was successfully updated
            echo 'Student record updated successfully!';
        } else {
            // Student record update failed, show an error message
            echo 'Student record update failed: ' . mysqli_error($conn);
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
