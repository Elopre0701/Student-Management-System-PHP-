<?php
 require_once ('nav.php');
 require_once('footer.php');
 
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
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>

    <title>Student Create</title>

    <!-- Link your custom CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Student Add</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                    <div class="mb-3">
                        <label for="year_level" class="form-label">Year Level</label>
                        <select name="year_level" class="form-control" id="year_level" required>
                            <option value="">Select Year Level</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" name="name" class="form-control" id="name"required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" name="email" class="form-control" id="email"required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Student Phone</label>
                            <input type="number" name="phone" class="form-control" id="phone" pattern="[0-9]+" title="Please enter numbers only" required>
                        </div>

                        <div class="mb-3">
                            <label for="course" class="form-label">Student Course</label>
                            <input type="text" name="course" class="form-control" id="course"required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>

    /* styles.css */

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

</body>
</html>
