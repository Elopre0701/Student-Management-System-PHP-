<?php
    require_once('nav.php');
    require_once('dbcon.php');
    require_once('footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        /* Custom CSS styles */
        /* Add your custom styles here */
    </style>
</head>
<body>
<div class="container mt-4 p-3">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="logo-container text-center mb-3">
                        <img src="2.jpg" alt="" class="logo img-fluid">
                    </div>
                    <h6 class="text-center">Student Information Management System</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Year Level</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // Assuming $totalStudents holds the total number of students
                                    $studentsPerPage = 8; // Number of students per page
                                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $startFrom = ($currentPage - 1) * $studentsPerPage;
                                    
                                    $query = "SELECT * FROM students3 LIMIT $startFrom, $studentsPerPage";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $student) {
                                ?>
                                <tr>
                                    <td><?= $student['id']; ?></td>
                                    <td><?= $student['year_level']; ?></td>
                                    <td><?= $student['name']; ?></td>
                                    <td><?= $student['course']; ?></td>
                                    <td>
                                        <center>
                                            <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No Record Found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                                $totalPages = ceil($totalStudents / $studentsPerPage);
                                $prevPage = $currentPage - 1;
                                $nextPage = $currentPage + 1;
                                echo "<li class='page-item " . ($currentPage == 1 ? 'disabled' : '') . "'><a class='page-link' href='?page=$prevPage'>Previous</a></li>";

                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                }

                                echo "<li class='page-item " . ($currentPage == $totalPages ? 'disabled' : '') . "'><a class='page-link' href='?page=$nextPage'>Next</a></li>";
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
 body {
    /* Set background image */
    background-image: url('10.jpg');
    /* Adjust background properties */
    background-size: cover; /* Cover the entire element */
    background-repeat: no-repeat; /* Prevent repetition */
    background-attachment: fixed; /* Keep the background fixed while scrolling */
  }
.container {
   max-width: 120vh; /* Set maximum width for the container */
   margin: auto; /* Center the container horizontally */
   top:60px;
}
.card-header {
    background-color: #ffffff;
    border-color: #000000;
    
}

.card-body {
    padding: 0;
}

table {
    width: 50%;
    height: 50%;
    border-collapse: collapse;
    text-align: center;
    font-size:13px;
}

th, td {
    padding: 8px;
    text-align: left;
    font-family: 'poppins';
   
}

th {
    background-color: #0c0c0c;
    font-weight: bold;
    text-align: center;
}

.float-end {
    float: right;
}

.btn {
    margin-right: 5px;
}
/* Custom CSS for the search form */
.form-control {
    border-radius: 0;
}

/* CSS for the search form */
form {
    display: flex;
    align-items: center; /* Align items vertically */
}

/* CSS for customizing button colors */
.btn-info {
    background-color: #17a2b8; /* Light blue for "View" button */
    border-color: #17a2b8;
    color: #000000;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
}

.btn-success {
    background-color: #00ff3c; /* Green for "Edit" button */
    border-color: #00ff3c;
    color: #000000;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}

.btn-danger {
    background-color: #fe0019; /* Red for "Delete" button */
    border-color: #ff0019;
    color: #000000;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}
/* CSS for the search form */
.input-group {
    width: 600px;
    margin: 0 auto; /* Center the input group */
}
.input-group .btn {
    width:40px; /* Set button width */
}
.button-container {
    text-align: center; /* Center align the content horizontally */
    margin-top: 20px; /* Add margin if needed */
    display: flex;
    justify-content: center;
}

.button-container .btn {
    margin: 0 5px; /* Add some spacing between buttons */
}
.container {
    position: relative; /* Ensure the container is relatively positioned */
}

#logoutButton {
    position: absolute;
    left: 0;
}
.logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px; /* Adjust the height of the container as needed */
}

.logo {
    max-width: 70%; /* Ensures the logo doesn't exceed its container width */
    max-height: 70%; /* Ensures the logo doesn't exceed its container height */
    width: auto; /* Allows the logo to resize proportionally */
    height: auto; /* Allows the logo to resize proportionally */
}
/* Pagination styles */
.pagination {
    display: flex;
    justify-content: end;
    margin-top: 5px;
}

.pagination .page-item {
    margin: 0 5px;
    list-style: none;
}

.pagination .page-link {
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
    padding: 4px 10px; /* Adjusted padding for smaller buttons */
    border-radius: 4px;
    font-size: 14px; /* Adjusted font size */
}

.pagination .page-link:hover {
    background-color: #e9ecef;
}

.pagination .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.pagination .page-item.disabled .page-link {
    pointer-events: none;
    cursor: not-allowed;
    color: #6c757d;
    background-color: #fff;
    border-color: #dee2e6;
}






    </style>

</body>
</html>