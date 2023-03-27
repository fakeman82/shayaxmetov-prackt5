<?php
include("header.php");
$con = mysqli_connect("localhost", "root", "", "shayaxmetov_fitness"); 
    
$sql_query = "select surname, name,patronymic, phone, photo, awards from users where role=2";

$result = mysqli_query($con, $sql_query);



?>
