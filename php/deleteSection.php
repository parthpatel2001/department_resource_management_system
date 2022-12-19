<?php
$secID = $_REQUEST["sectionID"];
$deptid=$_REQUEST["depart_id"];
$con = mysqli_connect("localhost", "root", "", "department");

$check = "DELETE FROM section WHERE sectionID='$secID'";
$query2="SELECT `totalsection` FROM `dept` WHERE `d_id`='$deptid'";
$result = mysqli_query($con,$query2);

$totalsection=mysqli_fetch_assoc($result);
if($totalsection["totalsection"]!=0)
{
    $query1="UPDATE `dept` SET `totalsection`=totalsection-1 WHERE `d_id`='$deptid'";
    $query1= mysqli_query($con,$query1);
}


$query = mysqli_query($con,$check);
if($query){

    echo json_encode(array("status"=>true,"msg"=>"Section Deleted Successfully"));
}
else{
    echo json_encode(array("status"=>false,"msg"=>"Something went wrong"));
}
?>