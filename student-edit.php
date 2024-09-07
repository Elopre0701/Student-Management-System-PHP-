<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   
    
</head>
<body>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Student Edit</h4>
                        <div class="card-footer text-center">
                        <a href="student.php" class="btn btn-danger float-end">
                        <i class="fas fa-times-circle"></i> CLOSE
                    </a>
                    </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students3 WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Year Level</label>
                                        <select name="year_level" class="form-control">
                                            <option value="">Select Year Level</option>
                                            <option value="1" <?php if ($student['year_level'] == '1') echo 'selected'; ?>>1st Year</option>
                                            <option value="2" <?php if ($student['year_level'] == '2') echo 'selected'; ?>>2nd Year</option>
                                            <option value="3" <?php if ($student['year_level'] == '3') echo 'selected'; ?>>3rd Year</option>
                                            <option value="4" <?php if ($student['year_level'] == '4') echo 'selected'; ?>>4th Year</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Name</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <input type="text" name="course" value="<?=$student['course'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">
                                            Update Student
                                        </button>
                                    </div>
                                </form>
                                <?php
                                
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Custom styles for Student Edit page */
        body {
            font-family: Courier, monospace; /* Set font family to Courier */
            background-image: url('10.jpg'); /* Add background image */
            background-size: cover; /* Ensure the background image covers the entire screen */
            background-repeat: no-repeat; /* Prevent background image from repeating */
            background-attachment: fixed; /* Keep the background image fixed while scrolling */
            color: #000000; /* Set text color to black */
        }

        .card {
            top:90px;
            background-color: white; /* Set card background color with opacity */
            border-radius: 10px; /* Add border radius to card for rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow for depth effect */
            margin: auto; /* Center the card horizontally */
            max-width: 700px; /* Set maximum width for the card */
            padding: 20px;
            margin-top: 50px; /* Adjust as needed */
        }

        /* Style the card header */
        .card-header {
            background-color: transparent; /* Bootstrap primary color */
            color: black; /* Text color */
            display: flex;
            justify-content: space-between; /* Align content */
            align-items: center; /* Align items */
        }

        /* Style the Back button */
        .btn-back {
            color: #fff; /* Button text color */
            border: none; /* Remove border */
            background: transparent; /* Transparent background */
            font-size: 16px; /* Button font size */
            text-decoration: none; /* Remove underline */
        }

        .btn-back:hover {
            color: #fff; /* Button text color on hover */
            text-decoration: none; /* Remove underline on hover */
        }

        /* Style the card body */
        .card-body {
            padding: 20px; /* Add padding */
        }

        /* Style form labels */
        .form-label {
            font-weight: bold; /* Make labels bold */
        }

        /* Style form inputs */
        .form-control {
            border-radius: 5px; /* Add border radius */
        }

        /* Style the Update Student button */
        .btn-primary {
            width: 40%; /* Button width */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
