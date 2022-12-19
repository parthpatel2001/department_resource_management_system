<?php
$con = mysqli_connect("localhost", "root", "", "department");
$records = array();
$selectSec = "SELECT `d_id`, `name`, `hod_name`, `description`, `totalsection` FROM `dept`";
$result = mysqli_query($con, $selectSec);
while ($row = mysqli_fetch_assoc($result)) {
    $records[] = array("categoryName"=>$row["name"],"categoryDesc"=>$row["description"],"categoryID"=>$row["d_id"]);
}
echo json_encode($records);