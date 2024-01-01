<?php
include 'db_connection.php';

// SQL query to retrieve data from the 'students' table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><h4>{$row['name']}</h4></td>";
        echo "<td><span class='text-primary font-w600'>ID {$row['id']}</span></td>";
        echo "<td><h6 class='mb-0'>{$row['classroom']}</h6></td>";
        echo "<td><h6 class='mb-0'>{$row['class_stream']}</h6></td>";
        echo "</tr>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>