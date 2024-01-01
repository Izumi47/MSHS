<?php
// Include the database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $id = $_POST["id"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password for security
    
    // Read the content of the default image
    $picture = file_get_contents("../images/no-img-avatar.png");

    if ($picture === false) {
        // Handle the error, e.g., set a default value or skip the insert
        echo "Error: Unable to read the image file.";
        exit; // or handle it differently
    }
    
    $position = "Teacher";

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    $email .= "@mshs.com"; // Append domain to email

    // Insert the teacher data into the database
    $insertQuery = "INSERT INTO users (name, contact, id, email, birthdate, password, picture, position)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssss", $name, $contact, $id, $email, $birthdate, $password, $picture, $position);

        if ($stmt->execute()) {
            echo 'Teacher added successfully!';
        } else {
            echo 'Teacher insertion failed: ' . mysqli_error($conn);
        }
        
        $stmt->close();
    } else {
        echo 'Statement preparation failed: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request method.';
}

$conn->close();
?>
