<?php 
    include './include/_header.php';

    $updateQuery = "UPDATE `php_quiz`.`questions` SET `file`='1'";

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
