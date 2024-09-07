<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students3 WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Student Deleted',
                    text: 'Student Deleted Successfully',
                }).then(function() {
                    window.location = 'student.php';
                });
             </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Student Not Deleted',
                });
             </script>";
    }
}


if (isset($_POST['update_student'])) {
    // Ensure that $con is the valid database connection
    require 'dbcon.php';

    // Extracting parameters from POST request
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Construct the UPDATE query dynamically to include all fields
    $query = "UPDATE students3 SET year_level ='$year_level', name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Student Updated',
                    text: 'Student Updated Successfully',
                }).then(function() {
                    window.location = 'student.php';
                });
             </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Student Not Updated',
                });
             </script>";
    }
}




if (isset($_POST['save_student'])) {
    $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students3 (year_level,name, email, phone, course) VALUES ('$year_level','$name','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Student Created',
                    text: 'Student Created Successfully',
                }).then(function() {
                    window.location = 'student-create.php';
                });
             </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Student Not Created',
                });
             </script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    $stmt = $con->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $comment);

    if ($stmt->execute()) {
        echo "<script>
        swal({
            title: 'Success',
            text: 'New comment record created successfully',
            icon: 'success'
        }).then(() => {
            window.location.href = 'landing.php'; // Redirect to landing.php
        });
      </script>";

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$con->close();
?>
