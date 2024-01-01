<?php
include 'db_connection.php';

$studentId = isset($_GET['id']) ? $_GET['id'] : '';

if ($studentId) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentId);

    if ($stmt->execute()) {
        $_SESSION['status'] = 'success'; // Set session variable on success
        header("Location: ../admins-dashboard.php");
        exit();
    } else {
        $_SESSION['status'] = 'error'; // Set session variable on error
        header("Location: ../admins-dashboard.php");
        exit();
    }
} else {
    $_SESSION['status'] = 'error'; // Set session variable for invalid ID
    header("Location: ../admins-dashboard.php");
    exit();
}

$conn->close();

?>