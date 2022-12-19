<?php
$con = mysqli_connect("localhost", "root", "", "department");

$sectionID = $_POST["sectionID"];
$sectionName = $_POST["sectionName"];
$sectionCapacity = $_POST["sectionCapacity"];
$sectionDesc = $_POST["sectionDesc"];

$updateSection = "UPDATE `dept` SET `name`='$sectionName',`hod_name`='$sectionCapacity',`description`='$sectionDesc' WHERE `d_id` = '$sectionID'";
$query = mysqli_query($con,$updateSection);
if($query){
    echo json_encode(array("status"=>true,"msg"=>"Department Updated Successfully"));
}
else{
     echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
}
?>