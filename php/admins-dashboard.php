<?php
include 'db_connection.php';

// SQL query to retrieve data from the 'users' table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><h4>{$row['name']}</h4></td>";
        echo "<td><h6 class='mb-0'>{$row['position']}</h6></td>";
        echo "<td><span class='text-primary font-w600'>ID {$row['id']}</span></td>";
        echo "<td><h6 class='mb-0'>{$row['contact']}</h6></td>";
        echo "<td><h6 class='mb-0'>{$row['birthdate']}</h6></td>";
        echo "<td>";
        echo "<div class='d-flex'>";

        // Check role or position and set the appropriate link
        $profileLink = '';
        if (strtolower($row['position']) == 'student') {
            $profileLink = "admins-student-profile.php?id={$row['id']}";
        } else {
            // Default link or handle other roles
            $profileLink = "admins-user-profile.php?id={$row['id']}";
        }

        echo "<a href='{$profileLink}' class='btn btn-primary shadow btn-xs sharp me-1'><i class='fas fa-pencil-alt'></i></a>";
        echo "<a class='btn btn-danger shadow btn-xs sharp delete-btn' id='" . $row['id'] . "'><i class='fa fa-trash'></i></a>";
        echo "</div>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>
