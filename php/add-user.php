<?php
// Include the database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $id = $_POST["id"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $address = $_POST["address"];

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    // Insert the student data into the database
    $insertQuery = "INSERT INTO students (name, contact, id, email, birthdate, address)
                    VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    
    if ($stmt) {
        $stmt->bind_param("ssssss", $name, $contact, $id, $email, $birthdate, $address);

        if ($stmt->execute()) {
            // Student record was successfully added to the database
            echo 'User record added successfully!';
        } else {
            // Student record insertion failed, show an error message
            echo 'User record insertion failed: ' . mysqli_error($conn);
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
