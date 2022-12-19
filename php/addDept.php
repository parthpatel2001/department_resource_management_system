<?php
$sectionName = $_POST["sectionName"];
$sectionCapacity = $_POST["sectionCapacity"];
$sectionDesc = $_POST["sectionDesc"];
$sectionAllocated = 0;

$con = mysqli_connect("localhost", "root", "", "department");
$check = "SELECT * FROM `dept` WHERE `name`='$sectionName'";
$query = mysqli_query($con,$check);
if(mysqli_num_rows($query)>0){
    echo json_encode(array("status"=>false,"msg"=>"Section alreday exist!"));
}
else{
    $addSec = "INSERT INTO `dept`(`d_id`, `name`, `hod_name`, `description`, `totalsection`) VALUES ('','$sectionName','$sectionCapacity','$sectionDesc','$sectionAllocated')";
    $result = mysqli_query($con, $addSec);
    if($result){
        echo json_encode(array("status"=>true,"msg"=>"Department added Successfully"));
    }
    else{
        echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
    }
}
?>