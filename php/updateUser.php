<?php
$con = mysqli_connect("localhost", "root", "", "department");

$id = $_POST["userId"];
$name = $_POST["Name"];
$role = $_POST["Role"];
$email = $_POST["Email"];
$password=$_POST["Password"];

$updateSection = "UPDATE `user` SET `id`='$id',`name`='$name',`email`='$email',`password`='$password',`role`='$role' WHERE `id`='$id'";
$query = mysqli_query($con,$updateSection);

if($query){
    echo json_encode(array("status"=>true,"msg"=>"User Data Updated Successfully."));
}
else{
     echo json_encode(array("status"=>false,"msg"=>"Something went wrong."));
}
?>