<?php
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
    <title>Student View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                        <a href="student.php" class="btn btn-danger float-end">
                        <i class="fas fa-times-circle"></i> CLOSE
                    </a>
                        </h4>
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
                                 <div class="mb-3">
                                        <label>Year Level</label>
                                        <p class="form-control">
                                            <?=$student['year_level'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Email</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Phone</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Student Course</label>
                                        <p class="form-control">
                                            <?=$student['course'];?>
                                        </p>
                                    </div>

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
        /* Custom CSS for Student View page */

/* Adjust the margin for better spacing */
.container {
    margin-top: 50px;
}

/* Style the card */
.card {
    background-color: transparent; /* Light gray background color */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
}

/* Style the card header */
.card-header {
    background-color: transparent; /* Primary color for the header */
    color: black; /* White text color */
    padding: 15px; /* Padding for better appearance */
}

/* Style the card body */
.card-body {
    padding: 20px; /* Add padding for content */
}

/* Style labels */
label {
    font-weight: bold; /* Make labels bold */
}

/* Style paragraph elements within the form-control class */
.form-control p {
    margin-bottom: 0; /* Remove default margin for paragraphs */
}
body {
    font-family: Courier, monospace; /* Set font family to Courier */
    background-image: url('10.jpg'); /* Add background image */
    background-size: cover; /* Ensure the background image covers the entire screen */
    background-repeat: no-repeat; /* Prevent background image from repeating */
    background-attachment: fixed; /* Keep the background image fixed while scrolling */
    color: #000000; /* Set text color to black */
}

.card {
    top:140px;
    background-color: white; /* Set card background color with opacity */
    border-radius: 10px; /* Add border radius to card for rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow for depth effect */
    margin: auto; /* Center the card horizontally */
    max-width: 700px; /* Set maximum width for the card */
    padding: 20px;
}

        </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>