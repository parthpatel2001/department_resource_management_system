<?php
$name = $_POST["uname"];
$role=$_POST["role"];
$email = $_POST["email"];
$password = $_POST["password"];

$con = mysqli_connect("localhost", "root", "", "department");

//check a user emailis allready  exists or not
$check = "SELECT * FROM `user` WHERE `email`='$email'";
$query = mysqli_query($con,$check);
if(mysqli_num_rows($query)>0){
    echo json_encode(array("status"=>false,"msg"=>"Email is alreday exist!"));
}
else{

    // insert user in database
    $addSec = "INSERT INTO user VALUE('','$name','$email','$password','$role')";
    $result = mysqli_query($con, $addSec);
    if($result){
        echo json_encode(array("status"=>true,"msg"=>"User added Successfully"));
    }
    else{
        echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
    }
}
?>