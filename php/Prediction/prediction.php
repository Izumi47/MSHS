<?php
include '../db_connection.php';

$studentId = isset($_GET['id']) ? $_GET['id'] : '';

if ($studentId) {
    // Fetch student data from the database
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $studentData = $result->fetch_assoc();

        // Prepare the command
        $command = escapeshellcmd("python prediction.py " . 
            escapeshellarg($studentData['CGPA']) . " " .
            escapeshellarg($studentData['BM']) . " " .
            escapeshellarg($studentData['English']) . " " .
            escapeshellarg($studentData['Sejarah']) . " " .
            escapeshellarg($studentData['Maths']) . " " .
            escapeshellarg($studentData['Science']) . " " .
            escapeshellarg($studentData['Physical']) . " " .
            escapeshellarg($studentData['Interests']) . " " .
            escapeshellarg($studentData['Ambition']) . " " 
        );

        // Execute the command
        $output = shell_exec($command);

        //echo "<pre>$output</pre>";
        //echo "<pre>{$studentData['CGPA']}</pre>";
        //echo "<pre>{$studentData['BM']}</pre>";
        //echo "<pre>{$studentData['English']}</pre>";
        //echo "<pre>{$studentData['Sejarah']}</pre>";
        //echo "<pre>{$studentData['Maths']}</pre>";
        //echo "<pre>{$studentData['Science']}</pre>";
        //echo "<pre>{$studentData['Physical']}</pre>";
        //echo "<pre>{$studentData['Interests']}</pre>";
        //echo "<pre>{$studentData['Ambition']}</pre>";

        // Return the output as a JSON response
        echo json_encode(array("output" => $output));
    } else {
        echo json_encode(array("error" => "No student data found."));
    }

    $conn->close();
}
?>
