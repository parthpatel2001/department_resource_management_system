<?php
$sectionName = $_POST["sectionName"];
$deptid=$_POST["deptid"];
$sectionCapacity = $_POST["sectionCapacity"];
$sectionDesc = $_POST["sectionDesc"];
$sectionAllocated = 0;
$totalsection=$_POST["totalsection"];

$con = mysqli_connect("localhost", "root", "", "department");
$check = "SELECT sectionName FROM section WHERE sectionName='$sectionName'";
$query = mysqli_query($con,$check);
if(mysqli_num_rows($query)>0){
    echo json_encode(array("status"=>false,"msg"=>"Section alreday exist!"));

    //$row=mysqli_fetch_assoc($query);
    // if($deptid==$row["d_id"])
    // {
    // echo json_encode(array("status"=>false,"msg"=>"Section alreday exist!"));
    // }
}
else{
    //increament or update total sections in department
    $query2="UPDATE `dept` SET `totalsection`=totalsection+1 WHERE `d_id`='$deptid'";
    $result1 = mysqli_query($con,$query2);

    // insert section in database
    $addSec = "INSERT INTO section VALUE('','$deptid','$sectionName','$sectionDesc','$sectionCapacity','$sectionAllocated')";
    $result = mysqli_query($con, $addSec);
    if($result){
        echo json_encode(array("status"=>true,"msg"=>"Section added Successfully"));
    }
    else{
        echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
    }
}
?>