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
    $studentId = $_POST['userId'];
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $classroom = $_POST["classroom"];
    $address = $_POST["address"];
    $interests = isset($_POST["interests"]) ? implode(";", $_POST["interests"]) : "";
    $ambition = $_POST["ambition"];
    $class_stream = $_POST["class_stream"];
    $cgpa = $_POST["CGPA"];
    $bm = $_POST["bm"];
    $english = $_POST["english"];
    $sejarah = $_POST["sejarah"];
    $maths = $_POST["maths"];
    $science = $_POST["science"];
    $physical = $_POST["physical"];

    // Ensure that the 'contact' input always includes '(+60)' in the beginning
    if (!empty($contact) && strpos($contact, '+60') !== 0) {
        $contact = '+60' . $contact;
    }

    // Append "@mshs.com" to the email input
    $email .= "@mshs.com";
    
    // Update the student data in the database
    $updateQuery = "UPDATE students SET name = ?, contact = ?, email = ?, classroom = ?, address = ?, interests = ?, ambition = ?, class_stream = ?, CGPA = ?, BM = ?, English = ?, Sejarah = ?, Maths = ?, Science = ?, Physical = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    
    if ($stmt) {
        $stmt->bind_param("ssssssssssssssii", $name, $contact, $email, $classroom, $address, $interests, $ambition, $class_stream, $cgpa, $bm, $english, $sejarah, $maths, $science, $physical, $studentId);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);   
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo 'Student record updated successfully!';
            } else {
                echo 'No records updated. Check if the data is different from existing data or if the ID is correct.';
            }
        } else {
            echo 'Student record update failed: ' . mysqli_error($conn);
        }
        
        $stmt->close();
    } else {
        echo 'Statement preparation failed: ' . mysqli_error($conn);
    }
} else {
    // Invalid request method
    echo 'Invalid request method.';
}

// Close the database connection
$conn->close();
?>
