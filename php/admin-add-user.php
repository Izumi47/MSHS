<?php
// Include the database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $id = $_POST["id"];
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

    // Add "class stream" with a default value of "N/A"
    $classStream = "N/A";

    // Insert the student data into the database
    $insertQuery = "INSERT INTO students (name, contact, id, email, classroom, address, interests, ambition, class_stream)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    
    if ($stmt) {
        $stmt->bind_param("sssssssss", $name, $contact, $id, $email, $classroom, $address, $interests, $ambition, $classStream);

        if ($stmt->execute()) {
            // Student record was successfully added to the database
            echo 'Student record added successfully!';
        } else {
            // Student record insertion failed, show an error message
            echo 'Student record insertion failed: ' . mysqli_error($conn);
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
