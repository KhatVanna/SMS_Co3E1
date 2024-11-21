<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>School Management System</h1>
    <form id="studentForm" method="POST" action="process.php">
      <label for="studentName">Name:</label>
      <input type="text" id="studentName" name="name" placeholder="Enter name" required>
      
      <label for="studentSex">Sex:</label>
      <select id="studentSex" name="sex" required>
        <option value="">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      
      <label for="studentID">Student ID:</label>
      <input type="text" id="studentID" name="student_id" placeholder="Enter ID" required>
      
      <input type="hidden" id="editId" name="edit_id" value="">
      
      <button type="submit" name="submit">Add/Update Student</button>
    </form>
    <h2>Student List</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Sex</th>
          <th>Student ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'connection.php';
          $query = "SELECT * FROM students";
          $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['sex']}</td>
                    <td>{$row['student_id']}</td>
                    <td>
                      <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a>
                      <a href='delete.php?id={$row['id']}' class='delete-btn'>Delete</a>
                    </td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
