<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $student_id = $_POST['student_id'];
    $edit_id = $_POST['edit_id'];

    if (!empty($edit_id)) {
        // Update existing student
        $stmt = $conn->prepare("UPDATE students SET name = ?, sex = ?, student_id = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $sex, $student_id, $edit_id);
    } else {
        // Insert new student
        $stmt = $conn->prepare("INSERT INTO students (name, sex, student_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $sex, $student_id);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
