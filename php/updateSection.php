<?php
$con = mysqli_connect("localhost", "root", "", "department");

$sectionID = $_POST["sectionID"];
$sectionName = $_POST["sectionName"];
$sectionCapacity = $_POST["sectionCapacity"];
$sectionDesc = $_POST["sectionDesc"];
$sectionDepartment=$_POST["department"];

//First update department allocation 
$query1="SELECT * FROM `section` WHERE `sectionID`='$sectionID'";
$result=mysqli_query($con,$query1);
$row=mysqli_fetch_assoc($result);

if($sectionDepartment != $row["d_id"])
{
    $id=$row["d_id"];
    $q="UPDATE `dept` SET `totalsection`=totalsection-1 WHERE `d_id`='$id'";
    $r= mysqli_query($con,$q);
    $q1="UPDATE `dept` SET `totalsection`=totalsection+1 WHERE `d_id`='$sectionDepartment'";
    $r1= mysqli_query($con,$q1);
    $updateSection = "UPDATE section SET sectionName='$sectionName',`d_id`='$sectionDepartment', sectionCapacity='$sectionCapacity', sectionDesc='$sectionDesc' WHERE sectionID = '$sectionID'";
    $query = mysqli_query($con,$updateSection);    
}
else{
$updateSection = "UPDATE section SET sectionName='$sectionName', sectionCapacity='$sectionCapacity', sectionDesc='$sectionDesc' WHERE sectionID = '$sectionID'";
$query = mysqli_query($con,$updateSection);
}
if($query){
    echo json_encode(array("status"=>true,"msg"=>"Section Updated Successfully"));
}
else{
     echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
}
?>