<?php
$con=mysqli_connect("localhost", "root", "", "department");
$q="SELECT * FROM `user`";
$records = array();
$result=mysqli_query($con,$q);

while ($row = mysqli_fetch_assoc($result)) {

    $records[] = array("userid"=>$row["id"], "name"=>$row["name"],"email"=>$row["email"],"password"=>$row["password"],"type"=>$row["role"]);
}
echo json_encode($records);
?>