<?php 
// $conn= new mysqli('us-cdbr-east-04.cleardb.com','b821860059a73a','36f815a4','heroku_15411792d70b6d6');

$conn= new mysqli('localhost','root','','tms_db')or die("Could not connect to mysql".mysqli_error($conn));
