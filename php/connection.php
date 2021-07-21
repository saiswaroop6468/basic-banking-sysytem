<?php
$conn = new mysqli("localhost","root","","customer_details");
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
?>