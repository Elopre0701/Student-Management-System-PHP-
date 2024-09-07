<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files (dbcon.php and nav.php assumed)
require 'dbcon.php'; 
require 'nav.php';

// Initialize HTML for student table
$html = '';

// Pagination parameters
$studentsPerPage = 5; // Number of students per page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($currentPage - 1) * $studentsPerPage;

// Function to retrieve data from the database based on search query and pagination
// Function to retrieve data from the database based on search query and pagination
function fetchStudents($conn, $searchQuery, $startFrom, $studentsPerPage) {
    $sql = "SELECT * FROM students3 WHERE year_level = '4th year'";
    if (!empty($searchQuery)) {
        $sql .= " AND (name LIKE '%$searchQuery%' OR course LIKE '%$searchQuery%' OR id LIKE '%$searchQuery%')";
    }
    $sql .= " LIMIT $startFrom, $studentsPerPage";
    $result = mysqli_query($conn, $sql);
    $students = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }
    return $students;
}


// Check if form is submitted
if (isset($_GET['search'])) {
    // Get the search query
    $searchQuery = $_GET['search_query'];

    // Retrieve data from the database based on search query
    $students = fetchStudents($con, $searchQuery, $startFrom, $studentsPerPage);
} else {
    // If no search query, retrieve all students
    $students = fetchStudents($con, '', $startFrom, $studentsPerPage);
}

// Generate HTML for table rows
foreach ($students as $student) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($student['id']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['year_level']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['email']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['phone']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['course']) . '</td>';
    $html .= '</tr>';
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-pw+8JztyW5vDkKVOj+pwF3tE9dIm6oKgp6KxrD3ZRs8k+wzZzGRq4Cz+NIsVvzNteRtb7nOP1WSzIw5dQQfzXQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-4 p-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Search Form -->
                        <form method="GET" id="searchForm" action="" class="mb-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="searchQuery" name="search_query" placeholder="Search by Name, Course, or ID">
                            </div>
                            <button type="submit" class="search btn-dark" name="search">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </form>
                        
                        <div class="button-container d-flex justify-content-end"> <!-- Use flexbox to float to the end -->
    <button id="downloadCSV" class="btn btn-dark mr-2">Download CSV</button>
    <button id="downloadPDF" class="btn btn-dark">Download PDF</button>
</div>

<!-- Your other HTML content -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Define a function to handle the PDF download process
    // Define the downloadPDF function
    function downloadPDF() {
        html2canvas(document.getElementById('studentTable')).then(function(canvas) {
            let imgData = canvas.toDataURL('image/png');
            let pdf = new jsPDF('p', 'mm', 'a4');
            pdf.addImage(imgData, 'PNG', 0, 0, 210, 297);
            pdf.save('student_data.pdf');
        });
    }

    // Attach a click event listener to the downloadPDF button
    document.getElementById('downloadPDF').addEventListener('click', function() {
        // Call the downloadPDF function when the button is clicked
        downloadPDF();
    });

    $(document).ready(function() {
        // Download CSV
        $('#downloadCSV').click(function() {
            let csv = [];
            $('#studentTable tbody tr').each(function() {
                let row = [];
                $(this).find('td').each(function() {
                    row.push($(this).text());
                });
                csv.push(row.join(','));
            });
            let csvContent = 'data:text/csv;charset=utf-8,' + csv.join('\n');
            let encodedUri = encodeURI(csvContent);
            let link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'student_data.csv');
            document.body.appendChild(link);
            link.click();
        });

        // Download PDF
        // Attach the click event listener to the download butto
    });
</script>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Year Level</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Generated table rows -->
                                    <?php echo $html; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination links -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                $totalStudents = 20; // Example total students
                                $totalPages = ceil($totalStudents / $studentsPerPage);

                                // Generate pagination links
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
/* Global styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    background-image: url('10.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;

}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Card styles */
.card {
    border: 1px solid #ced4da; /* Light gray border */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
    background-color: #fff;
}

.card-header {
    background-color: #f8f9fa; /* Light gray background */
    border-bottom: 1px solid #ced4da; /* Light gray border */
    padding: 15px;
}

.card-body {
    padding: 20px;
}
/* Table styles */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ced4da; /* Light gray border */
}

.table th {
    background-color: white; /* Blue header background */
    color: black;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Light gray background for even rows */
}

.table tbody tr:hover {
    background-color: #e2e6ea; /* Lighter gray on hover */
}

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
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
