<?php 

$conn= new mysqli('us-cdbr-east-04.cleardb.com','b821860059a73a','36f815a4','heroku_15411792d70b6d6');
if (!$conn){
    die("Could not connect to mysql".mysqli_error($conn));
}
