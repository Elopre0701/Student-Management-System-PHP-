<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Management System</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="2.jpg">
  
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    *:focus,
    *:active {
    outline: none !important;
    -webkit-tap-highlight-color: transparent;
    }

    html,
    body {
    place-items: center;
    }

    .wrapper {
    display: inline-flex;
    list-style: none;
    }

    .wrapper .icon {
    position: relative;
    background: #ffffff;
    border-radius: 50%;
    padding: 15px;
    margin: 10px;
    width: 50px;
    height: 50px;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .tooltip {
    position: absolute;
    top: 0;
    font-size: 14px;
    background: #ffffff;
    color: #ffffff;
    padding: 5px 8px;
    border-radius: 5px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .tooltip::before {
    position: absolute;
    content: "";
    height: 8px;
    width: 8px;
    background: #ffffff;
    bottom: -3px;
    left: 50%;
    transform: translate(-50%) rotate(45deg);
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .wrapper .icon:hover .tooltip {
    top: -45px;
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    }

    .wrapper .icon:hover span,
    .wrapper .icon:hover .tooltip {
    text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
    }

    .wrapper .facebook:hover,
    .wrapper .facebook:hover .tooltip,
    .wrapper .facebook:hover .tooltip::before {
    background: #1877f2;
    color: #ffffff;
    }

    .wrapper .twitter:hover,
    .wrapper .twitter:hover .tooltip,
    .wrapper .twitter:hover .tooltip::before {
    background: #222222;
    color: #ffffff;
    }

    .wrapper .instagram:hover,
    .wrapper .instagram:hover .tooltip,
    .wrapper .instagram:hover .tooltip::before {
    background: #e4405f;
    color: #ffffff;
    }

    .wrapper .github:hover,
    .wrapper .github:hover .tooltip,
    .wrapper .github:hover .tooltip::before {
    background: #833ab4;
    color: #ffffff;
    }

    .wrapper .youtube:hover,
    .wrapper .youtube:hover .tooltip,
    .wrapper .youtube:hover .tooltip::before {
    background: #cd201f;
    color: #ffffff;
    }
    /* Body padding to avoid content behind fixed navbar */
    body {
        padding-top: 60px;
        margin: 0; /* Add to reset default margin */
    }

    /* Jumbotron styling */
    .jumbotron {
        background-image: url('bg.jpeg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 100px 0;
        color: black;
        height: 105vh;
        margin-bottom: 0; /* Add to reset default margin */
    }

    /* Footer styling */
    footer {
        margin-top: 50px;
        background-color: #343a40;
        color: white;
        padding: 20px 0; /* Add padding for content */
    }

    /* Navbar brand image styling */
    .navbar-brand img {
        width: 80px;
        height: 80px;
        border-radius: 10%;
        object-fit: cover;
        margin-left:10px;
    }

    /* Contact section container */
    #contact {
        padding: 50px 0;
        background-color: #f8f9fa; /* Add background color */
    }

    /* Contact form styling */
    #contact form {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    /* Contact form input fields styling */
    #contact input[type="text"],
    #contact input[type="email"],
    #contact textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    /* Contact form submit button styling */
    #contact button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #contact button[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Our Location section styling */
    #contact .col-md-6:nth-child(2) {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Map iframe styling */
    #contact iframe {
        width: 100%;
        height: 250px;
        border: none;
        border-radius: 10px;
    }
    .card {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 20px; /* Added padding */
        margin-top: 50px; /* Adjusted margin top */
    }

    .card-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.6;
    }
    .container-cards {
        margin-top: 20px; /* Adjust margin as needed */
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Add shadow effect */
    }

    .card img {
        width: 100%; /* Make images responsive */
        height: auto;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .card-text {
        font-size: 14px;
    }
    /* Style for the features section */
    .features-container { 
        margin-top: 40px; /* Adjust margin as needed */
    }
    #features {
        margin-top: 5vh; /* Adjust this value as needed */
        margin-bottom:5vh;
    }
    .features-container h2 {
        font-size: 24px; /* Adjust font size as needed */
        font-weight: bold;
        margin-bottom: 10px; /* Adjust margin as needed */  
    }

    .features-container p {
        font-size: 16px; /* Adjust font size as needed */
        color: #333; /* Adjust color as needed */
        line-height: 1.5;
    }
    /* Style for the card on hover */
    .card:hover {
        transform: scale(1.05); /* Scale up the card on hover */
        transition: transform 0.3s ease; /* Add a smooth transition */
    }

    /* Additional styling for the card */
    .card {
        transition: transform 0.3s ease; /* Add a default transition for a smooth effect */
    }

    /* Card title styling */
    .card-title {
        font-size: 18px; /* Adjust the title font size */
    }

    /* Card text styling */
    .card-text {
        font-size: 14px; /* Adjust the text font size */
        color: #555; /* Set text color */
    }
    .card {
            margin-bottom: 20px;
            /* Add margin bottom to create space between cards */
        }
    #features .col-md-8 {
        margin-top: 15px; /* Adjust this value as needed */

    }
    .card {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    display: flex;
    flex-direction: column;
    margin: 0 auto; 
    }

    .title {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    }

    .form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    }

    .group {
    position: relative;
    }

    .form .group label {
    font-size: 14px;
    color: rgb(99, 102, 102);
    position: absolute;
    top: -10px;
    left: 10px;
    background-color: #fff;
    transition: all .3s ease;
    }

    .form .group input,
    .form .group textarea {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    outline: 0;
    width: 100%;
    background-color: transparent;
    }

    .form .group input:placeholder-shown+ label, .form .group textarea:placeholder-shown +label {
    top: 10px;
    background-color: transparent;
    }

    .form .group input:focus,
    .form .group textarea:focus {
    border-color: #3366cc;
    }

    .form .group input:focus+ label, .form .group textarea:focus +label {
    top: -10px;
    left: 10px;
    background-color: #fff;
    color: #3366cc;
    font-weight: 600;
    font-size: 14px;
    }

    .form .group textarea {
    resize: none;
    height: 100px;
    }

    .form button {
    background-color: #3366cc;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    }

    .form button:hover {
    background-color: transparent; /* Make the background transparent */
    color: black; /* Set the text color to black */
    text-decoration: underline; /* Underline the text */
}

    .location-heading {
        font-size: 18px; /* Adjust font size as needed */
        font-weight: bold; /* Make text bold */
        color: #333; /* Set text color */
        margin-bottom: 10px; /* Add margin at the bottom for spacing */
        margin-top:20px;
    }
    #about{
        margin-bottom:5vh;
    }
    .about-section {
    padding: 80px 0; /* Add some padding for spacing */
    }

    /* Style the container within the About Us section */
    .about-section .container {
    max-width: 1200px; /* Set maximum width for better readability */
    }

    /* Style the heading */
    .about-section h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 30px;
    color: #333; /* Set appropriate text color */
    }

    /* Style the paragraph text */
    .about-section p {
    font-size: 16px;
    line-height: 1.6;
    color: #666; /* Set appropriate text color */
    }

    /* Style the image */
    .about-section .img-fluid {
    max-width: 100%;
    height: auto;
    border-radius: 8px; /* Add a border radius for rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    /* Media query for responsiveness */
    @media (max-width: 768px) {
    .about-section .container {
        padding: 0 20px; /* Adjust padding for smaller screens */
    }
    }
    /* Navigation Bar Styling */
    .navbar {
    background-color: #343a40; /* Set the background color */
    padding: 2px 0; /* Add padding to the navbar */
    }

    /* Navigation Links Styling */
    .navbar-nav {
    margin-left: auto; /* Move the links to the right */
    }

    .nav-item {
    margin-right: 15px; /* Add spacing between nav items */
    }

    .nav-link {
    color: black; /* Set text color */
    font-weight: 500; /* Set font weight */
    transition: color 0.3s ease; /* Add smooth color transition */
    }

    .nav-link:hover {
    color: black; /* Change color on hover */
    }

    /* Login and Register Buttons Styling */
    .nav-link.login, .nav-link.register {
    background-color: #ffc107; /* Set background color */
    color: #343a40; /* Set text color */
    padding: 8px 15px; /* Add padding to the buttons */
    border-radius: 5px; /* Add border radius for rounded corners */
    font-weight: 500; /* Set font weight */
    transition: background-color 0.3s ease; /* Add smooth background color transition */
    }

    .nav-link.login:hover, .nav-link.register:hover {
    background-color: #e0a800; /* Change background color on hover */
    color: #343a40; /* Set text color on hover */
    }

    /* Responsive Styling for Small Screens */
    @media (max-width: 768px) {
    .navbar-nav {
        margin-left: 0; /* Center align links on small screens */
        text-align: center; /* Center align text */
    }

    .nav-item {
        margin: 0 0 15px 0; /* Add spacing between nav items on small screens */
    }
    }
    /* Navbar Toggler Button Styling */
    .navbar-toggler {
    border: none; /* Remove border */
    background-color: transparent; /* Set background color transparent */
    color: black; /* Set text color */
    font-size: 1.5rem; /* Set font size */
    padding: 0; /* Remove padding */
    cursor: pointer; /* Set cursor to pointer */
    transition: color 0.3s ease; /* Add smooth color transition */
    
    }

    /* Navbar Toggler Icon Styling */
    .navbar-toggler-icon {
    background-image: url('data:image/svg+xml;charset=UTF-8,<svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path stroke="black" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>'); /* Add custom SVG icon */
    background-size: contain; /* Adjust icon size */
    width: 100px; /* Set width */
    height: 30px; /* Set height */
    display: inline-block; /* Display as inline block */
    color: black; /* Set text color */
    }

    /* Navbar Toggler Icon Animation on Hover */
    .navbar-toggler:hover .navbar-toggler-icon {
    stroke: #ffc107; /* Change stroke color on hover */
    }
    html {
        scroll-behavior: smooth;
    }   
    .navbar-nav .nav-item .nav-link.active,
    .navbar-nav .nav-item .nav-link.active:hover 
    {
        background-color: #007bff; /* Change background color for active link */
        color: #fff; /* Change text color for active link */
        border-radius: 10px; /* Add border radius for rounded corners */
    }
    .about-section {
    background-image: url('jpg'); /* Replace 'your-background-image.jpg' with your image file */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 50px 0; /* Adjust padding as needed */
    color: #fff; /* Adjust text color to ensure readability */
}
.bg-black {
    background-color:white; /* Replace 'your-background-image.jpg' with your image file */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 20px; /* Adjust padding as needed */
    border-radius: 10px; /* Rounded corners */
    color: #fff; /* Adjust text color to ensure readability */
}
.animate-in {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
 }
.animate-in.active {
     opacity: 1;
    transform: translateY(0);
}
@keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .img-bounce {
            animation: bounce 2s ease-in-out infinite;
            animation-delay: 1s; /* Delay for 1 second */
        }
        .card {
            animation: bounce 2.5s ease-in-out infinite;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
       
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px);">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="1.jpg" alt="Your Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <!-- Login Button -->
              <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <!-- Register Button -->
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </nav>
    <header id="home" class="jumbotron jumbotron-fluid text-center d-flex align-items-center">
    <div class="container">
        <h1 class="display-4">Student Information Management System</h1>
        <p class="lead">Efficiently manage student data with our comprehensive system.</p>
        <a href="#features" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</header>
<div id="features" class="container">
    <div class="row">
        <div class="col-md-8">
        <h2 class="animate-in">Features</h2>
        <p class="animate-in">Explore our powerful features designed to simplify student information management</p>
</div>
<div class="row">
    <div class="col p-3">
        <div class="card" style="width: 22rem; height: 60vh;">
            <img src="15.jpg" class="card-img-top fade-in move-in" alt="...">
            <div class="card-body">
                <h5 class="card-title">Manage the Student Records</h5>   
                <p class="card-text">
                    This feature allows administrators and staff members to efficiently manage student records,
                    including personal information, academic history, and enrollment status.
                    It provides tools for adding new students, editing existing records, and maintaining data accuracy.
                </p>
            </div>
        </div>
    </div>
    <div class="col p-3">
        <div class="card" style="width: 22rem; height: 60vh;">
            <img src="14.jpg" class="card-img-top fade-in move-in" alt="...">
            <div class="card-body">
                <h5 class="card-title">Track the attendance</h5> 
                <p class="card-text">
                    This feature enables teachers and administrators to monitor student attendance in classes,
                    lectures, and events. It provides a convenient way to mark attendance, view attendance history,
                    and identify trends in student participation.
                </p>
            </div>
        </div>
    </div>
    <!-- New card aligned with the last card -->
    <div class="col p-3">
        <div class="card" style="width: 22rem; height: 60vh;">
            <img src="16.jpg" class="card-img-top fade-in move-in" alt="...">
            <div class="card-body">
                <h5 class="card-title">Generate Reports</h5>
                <p class="card-text">
                    This feature allows users to generate various types of reports based on student data,
                    attendance records, academic performance, and other relevant metrics. It provides insights
                    for decision-making, strategic planning, and performance evaluation within the institution.
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class = "animate-in">About Us</h2>
                    <p class = "animate-in">
                        A Management Information System (MIS) is a systematic approach to collecting, processing, storing, and disseminating information related to the management and operations of an organization. It involves the use of technology and processes to gather data, convert it into meaningful information, and provide insights for decision-making. MIS supports various functions within an organization, including planning, controlling, and decision-making, by providing timely, accurate, and relevant information to managers. It plays a crucial role in improving organizational efficiency, effectiveness, and competitiveness. MIS encompasses hardware, software, personnel, and data resources, creating a comprehensive framework for managing information to meet organizational goals..</p>
                    <p class = "animate-in">SIMS typically includes modules or components tailored to specific organizational needs, such as student information management, human resources management, finance and accounting, inventory management, and customer relationship management.
                    </p>
                    <p class = "animate-in">The primary goal of a SIMS is to streamline and automate routine tasks, enhance data accuracy, improve information accessibility, and enable better decision-making at all levels of the organization. It serves as a centralized repository for managing diverse types of data, ranging from basic demographic information to complex financial transactions and analytical reports.</p>
                </div>
                <div class="col-md-6">
                    <!-- You can add an image or any other content about your team, organization, or project here -->
                    <img src="1.jpg" alt="About Us Image" class="img-fluid img-bounce">
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="bg-light py-5" style="background-image: url('17.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <h2 class="animate-in mb-4">Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 40vh; margin-bottom: 30px;">
                    <span class="title">Leave a Comment</span>
                    <div class="form">
                        <form action="code.php" method="post">
                            <div class="group">
                                <input placeholder="" type="text" name="name" required>
                                <label for="name">Name</label>
                            </div>
                            <div class="group">
                                <input placeholder="" type="email" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="group">
                                <textarea placeholder="" name="comment" rows="5" required></textarea>
                                <label for="comment">Comment</label>
                            </div>
                            <button type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-md-4 bg-black" style="border-radius: 10px; width: 40vh; height:51vh;margin-left:30px;">
                <h2 style="color: black ;">Address</h2>
                <h5 class="location-heading"style="color:black;">NBP Reservation Magdaong Drive Poblacion Muntiinlupa City</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.878139139296!2d121.0258633143485!3d14.37952838009884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d02cc7b1e345%3A0x51fdbee47cdaf013!2sNBP%20RESERVATION%20MAGDAONG%20DRIVE%20POBLACION%20MUNTINLUPA%20CITY!5e0!3m2!1sen!2sph!4v1645894540632!5m2!1sen!2sph" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <ul class="wrapper">
                    <a href="https://web.facebook.com/tamesa2014" target="_blank" rel="noopener noreferrer">
                        <li class="icon facebook">
                            <span class="tooltip">Facebook</span>
                            <span><i class="fab fa-facebook-f"></i></span>
                        </li>
                    </a>
                    <a href="https://www.instagram.com/itsmepotchy/" target="_blank" rel="noopener noreferrer">
                        <li class="icon instagram">
                            <span class="tooltip">Instagram</span>
                            <span><i class="fab fa-instagram"></i></span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</section>
 
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the class 'animate-in'
            const elements = document.querySelectorAll('.animate-in');

            // Function to check if an element is in the viewport
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

            // Function to toggle the 'active' class for elements in viewport
            function toggleAnimation() {
                elements.forEach(element => {
                    if (isInViewport(element)) {
                        element.classList.add('active');
                    }
                });
            }

            // Initial check on page load
            toggleAnimation();

            // Check on scroll and resize
            window.addEventListener('scroll', toggleAnimation);
            window.addEventListener('resize', toggleAnimation);
        });
    </script>
</html>
