<?php

// Attempt to establish a connection
$con = mysqli_connect("localhost", "jhon", "1234", "dbregister2");

// Check if the connection is successful
if ($con) {
    echo "";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

?>
