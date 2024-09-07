<?php
require_once('dbcon.php');
require_once('nav.php');
require_once('footer.php');

// Function to fetch total students based on the year level
function getTotalStudents($con, $yearLevel)
{
    $query = "SELECT COUNT(*) AS total_students FROM students3 WHERE year_level = '$yearLevel'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_students'];
}

// Function to fetch total students from all year levels
function getTotalStudentsAll($con)
{
    $query = "SELECT COUNT(*) AS total_students FROM students3";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_students'];
}

// Fetch total students
$total_students = getTotalStudentsAll($con);

// Fetch total students for each year level
$total_students_in_first_year = getTotalStudents($con, '1st year');
$total_students_in_second_year = getTotalStudents($con, '2nd year');
$total_students_in_third_year = getTotalStudents($con, '3rd year');
$total_students_in_fourth_year = getTotalStudents($con, '4th year');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Your existing styling code here -->

    <div class="container welcome-container">
        <h1 class="animate__animated animate__fadeInDown">WELCOME ADMIN</h1>
    </div>
    <div class="container">
    <div class="row">
        <?php
        // Function to generate a card
        function generateCard($title, $totalStudents, $link)
        {
            echo '<div class="col-md-4 p-2" style="padding-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><i class="bx bx-user"></i> ' . $title . '</h5>
                        </div>
                        <div class="card-body">
                            <p class="total-students">' . $totalStudents . '</p>
                            <a href="' . $link . '" class="small-box-footer">View Students <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>';
        }

        // Generate cards for each year level
        generateCard('Total Students', $total_students, 'student.php');
        generateCard('Total Students in 1st Year', $total_students_in_first_year, '1st.php');
        generateCard('Total Students in 2nd Year', $total_students_in_second_year, '2nd.php');
        generateCard('Total Students in 3rd Year', $total_students_in_third_year, '3rd.php');
        generateCard('Total Students in 4th Year', $total_students_in_fourth_year, '4th.php');
        ?>
    </div>
</div>


    <!-- Your existing JavaScript and Bootstrap JS code here -->

</body>
<style>
/* Global Styles */
        body {
    
            background-image: url('bg.jpeg'); /* Add your background image URL here */
            background-size: cover; /* Cover the entire background */
            background-repeat: no-repeat; /* Prevent repetition */
            background-attachment: fixed; /* Keep the background fixed while scrolling */
            background-color: #f8f9fa; /* Light gray background color */
            font-family: Poppins, sans-serif; /* Default font family */
        }

        .container {
            margin-top: 50px; /* Add margin from the top */
            
        }

        /* Welcome Section */
        .welcome-container {
            text-align: center; /* Center the text horizontally */
            margin-top: 100px; /* Add margin from the top */
            margin-bottom:-100px;
        }

        .welcome-container h1 {
            font-size: 32px; /* Font size for the welcome heading */
            color: #333; /* Text color */
            font-weight: bold; /* Bold font weight */
        }

        /* Cards */
        .card {
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 8px; /* Rounded corners */
            margin-bottom: 20px; /* Margin between cards */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow */
            margin-bottom:20px;
            
        }

        .card-header {
            background-color: black; /* Header background color */
            color: #fff; /* Header text color */
            padding: 10px 15px; /* Padding for header */
            border-top-left-radius: 8px; /* Rounded top-left corner */
            border-top-right-radius: 8px; /* Rounded top-right corner */
        }

        .card-title {
            margin: 0; /* Remove default margin */
            font-size: 18px; /* Font size for card titles */
        }

        .card-body {
            padding: 20px; /* Padding for card body */
        }

        /* Total Students Section */
        .total-students {
            font-size: 24px; /* Font size for total students */
            color: #333; /* Text color */
            font-weight: bold; /* Bold font weight */
        }

        /* Footer Links */
        .small-box-footer {
            display: inline-block; /* Display as inline block */
            color: black; /* Link color */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Bold font weight */
            transition: color 0.3s ease; /* Smooth transition for color change */
        }

        .small-box-footer:hover {
            color: #0056b3; /* Link color on hover */
        }

        .small-box-footer i {
            margin-left: 5px; /* Spacing between text and icon */
            vertical-align: middle; /* Align icon vertically */
        }
        .card {
        /* Set a fixed height for all cards */
        height: 200px;
        /* Add some padding to the card body */
        padding: 20px;
        /* Set border radius to create rounded corners */
        border-radius: 10px;
        /* Add shadow to the card for depth */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Ensure text inside the card doesn't overflow */
        overflow: hidden;
        left:-20px;
        top:100px;
        
}

    </style>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
