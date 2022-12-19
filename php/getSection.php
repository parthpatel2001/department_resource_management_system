<?php
$con = mysqli_connect("localhost", "root", "", "department");
$records = array();
$selectSec = "SELECT * FROM section";
$result = mysqli_query($con, $selectSec);
while ($row = mysqli_fetch_assoc($result)) {

    $records[] = array("sectionID"=>$row["sectionID"], "d_id"=>$row["d_id"],"sectionName"=>$row["sectionName"],"sectionDesc"=>$row["sectionDesc"],"sectionCapacity"=>$row["sectionCapacity"],"sectionAllocated"=>$row["sectionAllocated"]);
}
echo json_encode($records);