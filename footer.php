<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- Add Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Footer Styles */
        .footer {
            background-color: transparent;
            color: white;
            padding: 40px;
            text-align: center;
            position: fixed; /* Change from absolute to fixed */
            width: 100%;
            bottom: 0;
            height: 60px; /* Set the height of the footer */
            border-top: 2px solid transparent;
            font-size:10px;
        }

        /* Styling for the copyright text */
        .copyright {
            display: inline-block;
            white-space: nowrap; /* Prevent line breaks */
            animation: marquee 10s linear infinite; /* Apply the animation */
        }

        /* Styling for the Font Awesome icon */
        .copyright i {
            margin-right: 5px; /* Add some spacing between the icon and text */
        }

        /* Animation for the copyright text */
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Footer Content Styles */
        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="footer">
    <div class="footer-content">
        <div class="copyright">
            <i class="fas fa-copyright"></i>
            <span>2024 Student Management System. All rights reserved.</span>
        </div>
    </div>
</div>

</body>
</html>

    </style>
</body>
</html>