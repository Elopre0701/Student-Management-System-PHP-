<?php
require_once ('nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anaytics</title>
    
</a>

<style>
  .close-btn {
    float:end;
    margin-right: 10px; /* Add margin to create space between the button and other elements */
    text-decoration: none; /* Remove underline */
    border: 1px solid #dc3545; /* Add a 1px solid border with a red color */
    padding: 5px 10px; /* Add padding to the button */
    border-radius: 5px; /* Add border radius for rounded corners */
    background-color: #dc3545;
    color: black; /* Change text color to match border color */
    
}

.close-btn:hover {
    background-color: #dc3545; /* Change background color on hover */
    color: #fff; /* Change text color on hover */
}

/* Style for the button icon */
.close-btn i {
    margin-right: 5px; /* Add space between the icon and text */
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <?php
// Include database connection and other necessary files
        require 'dbcon.php';
        require_once('footer.php');

        // Query to retrieve data from the database
        $query = "SELECT course, COUNT(*) as total_users FROM students3 GROUP BY course";
        $result = mysqli_query($con, $query);

        $labels = [];
        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['course'];
            $data[] = $row['total_users'];
        }

        // Close database connection
        mysqli_close($con);

        // Convert PHP arrays to JSON format for Chart.js
        $labels = json_encode($labels);
$data = json_encode($data);
$colors = ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 205, 86, 0.6)', 'rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 205, 86, 0.6)', 'rgba(75, 192, 192, 0.6)'];

?>

<canvas id="myChart" width="380" height="200"></canvas>

<script>
    // Parse PHP arrays to JavaScript
    var labels = <?php echo $labels; ?>;
    var data = <?php echo $data; ?>;
    var colors = <?php echo json_encode($colors); ?>;

    // Create the chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Students per Course',
                data: data,
                backgroundColor: colors,
                borderColor: colors,
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</script>
    </style>
    </body>
    </html>
