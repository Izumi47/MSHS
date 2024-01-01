<?php
// Include the database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $birthdate = $_POST["birthdate"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password for security
    $position = "Student";

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    // Append "@mshs.com" to the email input
    $email .= "@mshs.com";

    // Check if the user ID already exists
    $checkQuery = "SELECT COUNT(*) FROM users WHERE id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $id);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        // User ID already exists, show a warning message
        echo 'Matric ID is already registered!';
    } else {
        // Insert the user data into the 'users' table
        $insertQuery = "INSERT INTO users (name, id, email, contact, birthdate, password, position) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssssss", $name, $id, $email, $contact, $birthdate, $password, $position);

        if ($stmt->execute() && strtolower($position) == "student") {
            // User is a student, insert into 'students' table
            $insertStudentQuery = "INSERT INTO students (name, id, email, contact) VALUES (?, ?, ?, ?)";
            $stmtStudent = $conn->prepare($insertStudentQuery);
            $stmtStudent->bind_param("ssss", $name, $id, $email, $contact);

            if($stmtStudent->execute()) {
                echo 'Student registration successful!';
            } else {
                echo 'Student registration failed!';
            }
            $stmtStudent->close();
        } else if (!$stmt->execute()) {
            // Registration failed, show an error message
            echo 'Registration Failed!';
        } else {
            echo 'Registration Successful!';
        }
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
