<?php
$secID = $_REQUEST["sectionID"];

$con = mysqli_connect("localhost", "root", "", "department");

$check = "DELETE FROM `dept` WHERE `d_id`='$secID'";

$query = mysqli_query($con,$check);
if($query){
    echo json_encode(array("status"=>true,"msg"=>"Department Deleted Successfully"));
}
else{
    echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
}
?>