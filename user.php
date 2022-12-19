<?php 
    //Check Login Status, prevent unwanted access
    session_start();
    if(!isset($_SESSION['logged_in'])){
        header("Location: index.html");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Section</title>

    <!-- Bootsrap CSS And JQuery Libs -->
    <link rel="stylesheet" href="css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/sidebarStyles.css">
    <link rel="stylesheet" href="./css/sectionStyles.css">
    <link rel="stylesheet" href="./css/user.css">
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">

                <h4 class="sidebarTitle">Department Resources</h4>

                <ul class="sidebar-nav">
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link " href="department.php">Manage Department</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link " href="section.php">Manage Section</a>
                    </li>
                    <li class="sidebar-item "><a class="sidebar-link" href="categories.php">Manage Categories</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link " href="resources.php">Manage Resources</a></li>
                    <li class="sidebar-item"><a class="sidebar-link active" href="user.php">Manage User</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Of Sidebar Navigation -->

        <div class="main">
            <!-- Sidebar Navigation Hamburger Icon -->
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                    </ul>
                </div>
            </nav>
            <!-- End Of Sidebar Navigation Hamburger Icon -->

            <!-- Bootstap Modal For Add Section  -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                    <p class="addSectionRowTitle">Name: </p>
                                    <input type="text" name="sectionName" id="sectionNameModal"placeholder="Enter User Name" class="form-control">
                                </div>
                            </div>
                            <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                    <p class="addSectionRowTitle">Select Role: </p>
                                    <select name="resourceCategory" id="resourceCategoryModal" class="form-control">
                                        <option value="admin">ADMIN</option>
                                        <option value="user">USER</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                    <p class="addSectionRowTitle">Email: </p>
                                    <input type="text" name="sectionCapacity" id="sectionCapacityModal" min="1"
                                        placeholder="Enter User Email" class="form-control">
                                </div>
                            </div>
                            <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                <p class="addSectionRowTitle">Password: </p>
                                    <input type="text" name="password" id="password" min="1"
                                        placeholder="Enter User Passwor" class="form-control">
                                </div>
                            </div>

                            <!-- Error Msg (Invalid Inputs) -->
                            <div class="row" style="font-size: 1.2rem; color: red; display: none; margin-left: 1rem;"
                                id="errorMsg">
                                Inputs should not be empty!
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn modalAddSectionBtn" onclick="addSection()">Add
                                User</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstap Modal For Delete Section  -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete Section</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                    <p class="addSectionRowTitle" id="deleteMsg"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn modalAddSectionBtn" onclick="deleteSection()"
                                id="deleteSectionBtn">Delete User</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstap Modal For Update User  -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update User Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="row addSectionRow">
                            <div class="col-lg form-group">
                                <p class="addSectionRowTitle">Name: </p>
                                <input type="text" name="sectionName" id="sectionNameModal2"
                                    placeholder="Enter User Name" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row addSectionRow">
                                <div class="col-lg form-group">
                                    <p class="addSectionRowTitle">User Role: </p>
                                    <select name="resourceCategory" id="resourceCategoryModal2" class="form-control">
                                    </select>
                                </div>
                            </div>

                        <div class="row addSectionRow">
                            <div class="col-lg form-group">
                                <p class="addSectionRowTitle">Email : </p>
                                <input type="text" name="sectionCapacity" id="sectionCapacityModal2"
                                    placeholder="Enter User Email" class="form-control">
                            </div>
                        </div>
                        <div class="row addSectionRow">
                        <div class="col-lg form-group">
                                <p class="addSectionRowTitle">Password : </p>
                                <input type="text" name="password" id="userPassword"
                                    placeholder="Enter Password " class="form-control">
                            </div>
                            <!-- <div class="col-lg form-group">
                                <p class="addSectionRowTitle">Section Discription: </p>
                                <textarea rows="3" cols="100" name="sectionDisc" id="sectionDescModal2"
                                    placeholder="Enter Section Discription" class="form-control"></textarea>
                            </div> -->
                        </div>

                        <!-- Error Msg (Invalid Inputs) -->
                        <div class="row" style="font-size: 1.2rem; color: red; display: none; margin-left: 1rem;"
                            id="errorMsg">
                            Inputs should not be empty!
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn modalAddSectionBtn" onclick="updateSection()">Update
                                User</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Starts -->
            <main class="content p-4">
                <div class="container-fluid p-0">
                    <div class="row mb-2 mb-xl-3">

                        <!-- Add Categories Title -->
                        <div class="col-auto">
                            <h3 class="mainTitle">Manage User</h3>
                        </div>

                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" style="display:none;">
                            <span id="successAlertMsg"></span>
                        </div>

                        <div id="addSection" class="container">
                            <button class="btn btn-outline-primary addSectionBtn" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"><i class="fa fa-plus mr-3"></i>Add New
                                User</button>
                        </div>

                        <div class="col-auto">
                            <h3 class="secondTitle">All User</h3>
                        </div>

                        <!-- All Section List  -->
                        <div id="sectionList" class="row sectionList">
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <!-- Bootsrap And JQuery Libs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
    <script src="js/app.js"></script>

    <script>
        window.onload = function () {
            fetchTableData();
        }
       
        function addSection() {

            var name = document.getElementById("sectionNameModal").value;
            var role = document.getElementById("resourceCategoryModal").value;
            var email = document.getElementById("sectionCapacityModal").value;
            var password = document.getElementById("password").value;
            console.log("Name: "+name);
            console.log("r: "+role);
            console.log("e: "+email);
            console.log("p: "+password);

            document.getElementById("sectionNameModal").value = "";
            document.getElementById("sectionCapacityModal").value = "";
            document.getElementById("password").value = "";

          

            if (name == "" || email == "" || password == "") {
                document.getElementById("errorMsg").style.display = "block";
            } 
            else {

                var data = "uname=" + name +"&role="+ role + "&email=" + email + "&password=" + password +"";
                var XRH = new XMLHttpRequest();

                XRH.onload = function () {
                    // console.log(this.responseText);
                    obj = JSON.parse(this.responseText);

                    if (obj.status) {
                        showSuccessAlert(obj.msg);
                        $('#staticBackdrop').modal('hide');
                        fetchTableData();
                    }
                    else {
                        showErrorMsg(obj.msg);
                    }
                }
                XRH.open('POST', './php/addUser.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send(data);
            }
        }
        
        document.getElementById("sectionNameModal").onfocus = function () {
            document.getElementById("errorMsg").style.display = "none";
        }
        document.getElementById("sectionCapacityModal").onfocus = function () {
            document.getElementById("errorMsg").style.display = "none";
        }

        function showSuccessAlert(msg) {
            $("#successAlert").fadeTo(2000, 500).slideUp(500, function () {
                $("#successAlert").slideUp(500);
            });
            document.getElementById("successAlertMsg").innerHTML = msg;
        }

        $(document).ready(function () {
            $("#successAlert").hide();
        });

        function showErrorMsg(msg) {
            document.getElementById("errorMsg").innerHTML = msg;
            document.getElementById("errorMsg").style.display = "block";
        }

        // Global Varibles
        var obj = null;
        var tableData = null;

        function fetchTableData() {
            var XRH = new XMLHttpRequest();
            XRH.open('GET', './php/getUser.php');

            XRH.onload = function () {
                obj = JSON.parse(this.responseText);
                fetchAllData();
            }
            XRH.send();
        }
        
      
        function fetchAllData() {

            tableData = '<table><tr><th>Name</th><th>Email</th><th>Role</th><th colspan='+2+' >Action</th></tr>';
            
                if (obj != null) {

                for (let section of obj) {
                    tableData +='<tr><td>'+ section.name +'</td><td>'+ section.email +'</td><td>'+ section.type +'</td><td><a href="" id = "' + section.userid + '" class="card-link me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" onclick="getSectionDetails(this.id)">Update</a></td><td><a href="" id = "' + section.userid + '" class="card-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" onclick="getSectionDetails(this.id)">Delete</a></td>';
                }
                // console.log(tableData);
                document.getElementById("sectionList").innerHTML = tableData;
            }
        }
        var secID;
        var sectionAllocated;

        function getSectionDetails(val) {
            secID = val;
            // console.log(secID);
            let user = obj.find(o => o.userid === val);
            // console.log(user);
            var msg, role_option;
            
            msg = "User will be deleted permenantely!";
            document.getElementById("deleteMsg").innerHTML = msg;
            document.getElementById("deleteSectionBtn").style.display = "block";
            

            document.getElementById("sectionNameModal2").value = user.name;
            document.getElementById("sectionCapacityModal2").value = user.email;
            // document.getElementById("userPassword").value = user.password;

            if(user.type=="admin")
            {
                role_option = '<option value="admin">ADMIN</option><option value="user">USER</option>';
            }
            else
            {
                role_option = '<option value="user">USER</option><option value="admin">ADMIN</option>';
            }
                    document.getElementById("resourceCategoryModal2").innerHTML = role_option;
            }

        function deleteSection() {
            let section = obj.find(o => o.userid === secID);
            
            var data = "userID=" + secID;
            var XRH = new XMLHttpRequest();

            XRH.onload = function () {
                console.log(this.responseText);
                obj = JSON.parse(this.responseText);

                if (obj.status) {
                    showSuccessAlert(obj.msg);
                    $('#staticBackdrop1').modal('hide');
                    fetchTableData();
                }
            }
            XRH.open('POST', './php/deleteUser.php');
            XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            XRH.send(data);
        }

        function updateSection() {
            var name=document.getElementById("sectionNameModal2").value;
            var role=document.getElementById("resourceCategoryModal2").value;
            var email=document.getElementById("sectionCapacityModal2").value;
            var password=document.getElementById("userPassword").value;
            
            if (name == "" || email == "" || password == "") {
                document.getElementById("errorMsg").style.display = "block";
                console.log("something is wrong");
            }
            else {
                var data = "userId=" + secID + "&Name=" + name +"&Role="+ role + "&Email=" + email + "&Password=" + password + "";
                console.log(data);
                var XRH = new XMLHttpRequest();

                XRH.onload = function () {
                    console.log(this.responseText);
                    obj = JSON.parse(this.responseText);

                    if (obj.status) {
                        showSuccessAlert(obj.msg);
                        $('#staticBackdrop2').modal('hide');
                        fetchTableData();
                    }
                }
                XRH.open('POST', './php/updateUser.php');
                XRH.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                XRH.send(data);
            }
        }


    </script>
</body>

</html>