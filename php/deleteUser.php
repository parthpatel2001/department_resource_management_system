<?php
$userID = $_REQUEST["userID"];
$con = mysqli_connect("localhost", "root", "", "department");

$check = "DELETE FROM user WHERE id='$userID'";
$query = mysqli_query($con,$check);
if($query){

    echo json_encode(array("status"=>true,"msg"=>"User Deleted Successfully"));
}
else{
    echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
}
?>