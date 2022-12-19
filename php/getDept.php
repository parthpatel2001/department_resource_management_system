<?php
$con = mysqli_connect("localhost", "root", "", "department");
$records = array();
$selectSec = "SELECT * FROM `dept`";
$result = mysqli_query($con, $selectSec);
while ($row = mysqli_fetch_assoc($result)) {
    $records[] = array("sectionID"=>$row["d_id"],"sectionName"=>$row["name"],"sectionDesc"=>$row["description"],"sectionCapacity"=>$row["hod_name"],"sectionAllocated"=>$row["totalsection"]);
}
echo json_encode($records);