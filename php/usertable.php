<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    table {
  width: 100%;
  border-collapse: collapse;
  text-align: center;
  box-shadow: 0px 0px 4px black;
}

table, td, th {
  border: 1px #395c58;
  padding: 5px;
  text-align: center;
}

th {
  border: none;
  background-color: #395c58;
  padding: 10px;
  color: white;
  text-align: center;}
</style>
</head>
<body>

<!-- Print User data from database -->
<?php
$con=mysqli_connect("localhost", "root", "", "department");
$q="SELECT * FROM `user`";
$result=mysqli_query($con,$q);
$r=mysqli_query($con,$q);
$num=mysqli_num_rows($result);

echo json_encode($records);
if($num!=0)
{
    echo "<table>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th colspan='2' >Action</th>
        </tr>";
        while($row = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><a href='' id = '".$row['id']."' onclick='getSectionDetails(this.id)'>Update</a></td>";
            echo "<td><a href='' id = '".$row['id']."' onclick='getSectionDetails(this.id)'>Delete</a></td>";
          }
          echo "</table>";
}
?>
<table><tr><th>Name</th><th>Email</th><th>Password</th><th>Role</th><th colspan='2' >Action</th></tr>
<tr><td>"'+ section.name +'"</td><td>"'+ section.email +'"</td><td>"'+ section.password +'"</td><td>"'+ section.role +'"</td><td><a href="" id = "' + section.userid + '" class="card-link me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" onclick="getSectionDetails(this.id)">Update Section</a></td><td><a href="" id = "' + section.userid + '" class="card-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" onclick="getSectionDetails(this.id)">Delete Section</a></td>";
</body>
</html>
