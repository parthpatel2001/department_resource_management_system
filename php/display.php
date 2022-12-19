<?php
$tablname=$_POST["tablename"];
$con = mysqli_connect("localhost", "root", "", "department");
$selectSec = "SELECT * FROM `".$tablname."`";
// $selectSec = "SELECT * FROM `dept`";
$result = mysqli_query($con, $selectSec);
$rows=mysqli_num_rows($result);
echo $rows;
?>