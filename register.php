<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
       <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
            background-image: url('.jpg');

            background-size: cover; /* Cover the entire element */
            background-repeat: no-repeat; /* Prevent repetition */
            background-attachment: fixed;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Courier, monospace;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1); 
        }
        .login-form {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            width: 820px;
            height:500px;
            max-width: 90%;
        }
        .login-form img {
            width: 50%;
            object-fit: cover;
        }
        .login-form form {
            padding: 40px;
            width: 60%;
        }
        .login-form form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .login-form form input[type="text"],
        .login-form form input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            float: left;
            font-family: Courier, monospace;
        }
        .login-form form input[type="text"] + .fa,
        .login-form form input[type="password"] + .fa {
            float: right;
            margin-top: -45px;
            margin-right: 30px;
            color: black;
        }
        .login-form img.logo {
            width: 170px;
            margin: 0 auto 20px;
            display: block;
        }
     .login-form button[type="submit"] {
        width: 95%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: black; /* Blue color, you can change it to fit your design */
        color: white;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: all ease 0.1s; /* Smooth transition effect */
        margin-bottom: 20px;
        box-shadow: 0px 5px 0px 0px gray;
        font-family: Courier, monospace;
}
        /* Active effect for the button */
        .login-form button[type="submit"]:active {
            transform: translateY(5px);
            box-shadow: 0px 0px 0px 0px #a29bfe;
        }

        /* Float left to align the button */
        .login-form .float-left {
            float: left;
            margin-top: 5px; /* Adjust margin top as needed */
        }
        .login-form h2 {
            text-align: center; /* Align the text to the center */
            margin-bottom: 20px; /* Add margin at the bottom for spacing */
            font-size: 24px; /* Adjust font size as needed */
            color: #333; /* Text color */
            font-family:'courier';
     }   
            .text-center {
            text-align: center; /* Align text to the center */
            margin-top: 40px; /* Add margin at the top for spacing */
    }

    .text-center {
    text-align: center; /* Align text to the center */
    margin-top: 20px; /* Add margin at the top for spacing */
}

.text-center p {
    margin-top: 40px; /* Add margin at the top of the paragraph */
    margin-bottom: 0; /* Remove default margin at the bottom of the paragraph */
}

.text-center p a {
    color: #007bff; /* Set link color */
    text-decoration: none; /* Remove underline from links */
}

.text-center p a:hover {
    text-decoration: underline; /* Add underline on hover */
}
@media only screen and (max-width: 768px) {
    .login-form img {
        display: none;
    }   
    .login-form form {
        width: 100%;
        padding: 20px;
    }
    .login-form h2 {
        text-align: center;
    }
    input[type="text"],
    input[type="password"] {
        width: calc(100% - 42px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        float: left;
        font-family: Courier, monospace;
    }
    .login-form form button {
        width: 100%;
        margin-top: 10px;
    }
    .login-form .float-left {
        float: none;
    }
    .login-form form input[type="text"] + .fa,
    .login-form form input[type="password"] + .fa {
        float: right;
        margin-top: -45px;
        margin-right: 30px;
        display: inline-block;
        text-align: right;
    }
    .login-form img.logo {
        margin: 0 auto 20px;
        display: block;
    }
}
    </style>
</head>
<body>
<div class="container"> 
    <div class="login-form">
        <img src="11.jpg" alt="Login Image">
        <form action="#" method="POST">
        <img src="2.jpg" alt="Company Logo"class="logo">
            <h2><i class="fas fa-user-shield"></i> Register Admin</h2>
            <input type="text" name="email" placeholder="Email" requiredpattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
            <i class="fa fa-user"></i>
            <input type="password" name="password" placeholder="Password" required>
            <i class="fa fa-key"></i>
            <button type="submit" name="register" class="float-left">Register</button>
    </div>
    </form>
    </div>
</div>
<?php
    // Check if the form is submitted
    if (isset($_POST['register'])) {
        // Database connection
        $host = 'localhost';
        $db_username = 'jhon';
        $db_password = '1234';
        $database = 'dbregister2';

        $conn = new mysqli($host, $db_username, $db_password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve form data
            $email = $_POST['email'];
            $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO tblregister2 (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
            swal({
            title: 'Good job!',
            text: 'Registration successfully!',
            icon: 'success',
            }).then(function() {
                window.location.href = 'index.php'; // Redirect to next page
            });
        </script>";
    } else {
        $registrationMessage = "Error: " . $stmt->error;
    }


        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
   
    ?>
</body>
</html>