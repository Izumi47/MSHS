<?php
$db_host = "localhost";  // Your database host
$db_user = "root";       // Your database username
$db_password = "";       // Your database password
$db_name = "MSHS";       // Your database name

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
