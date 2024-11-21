<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student record based on ID
    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        echo "Student not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Edit Student</h1>
    <form id="studentForm" method="POST" action="process.php">
      <label for="studentName">Name:</label>
      <input 
        type="text" 
        id="studentName" 
        name="name" 
        placeholder="Enter name" 
        value="<?php echo htmlspecialchars($student['name']); ?>" 
        required
      >
      
      <label for="studentSex">Sex:</label>
      <select id="studentSex" name="sex" required>
        <option value="">Select</option>
        <option value="Male" <?php echo $student['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo $student['sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
      </select>
      
      <label for="studentID">Student ID:</label>
      <input 
        type="text" 
        id="studentID" 
        name="student_id" 
        placeholder="Enter ID" 
        value="<?php echo htmlspecialchars($student['student_id']); ?>" 
        required
      >
      
      <input type="hidden" id="editId" name="edit_id" value="<?php echo $student['id']; ?>">
      
      <button type="submit" name="submit">Update Student</button>
    </form>
  </div>
</body>
</html>
