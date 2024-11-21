<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
