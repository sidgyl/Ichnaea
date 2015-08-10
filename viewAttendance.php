<?php

include_once 'includes/DBconnection.php';
include_once 'includes/Instructor.php';
session_start();
if ($_SESSION['validCredentials']) {

?>

<html>
<head>
	<title>View Attendance</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/Ichnaea/css/main.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/formValidation.css"/>
</head>
<body style="margin-top: 60px">
	<div class="container">
		<nav class="navbar navbar-default col-xs-12 navbar-fixed-top" role="navigation">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Ichnaea</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li ><a href="">Home</a></li>
                <li class="active">
                  <a href="#">View Attendance  </a>
                </li>
                <li ><a href="ManageClass.php">Add New Class</a></li>
                <li ><a href="editCLass.php">Edit Class</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#" class="dropdown-toggle" text-align="right" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['name'] ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="includes/destroySession.php" >Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div class="panel panel-default col-md-12 col-sm-10 margin-div" id="activity-panel">
          <div class="panel-body">
            <div class="col-md-2 col-sm-2 span7 text-center" >
              <?php
                $myDBconnection = new DBconnection();
                $myDBconnection->ConnectToDB();

                $instructor = new Instructor("", "", "", $_SESSION['Email']);
                $response = $instructor->getAllClasses($myDBconnection->db, $_SESSION['Email']);
                foreach ($response as $ID){
                // echo '<button type="button" class="btn btn-primary button-css" onclick="getAttendance('.$ID[0].')">'.$ID[0].'</button>';
                  printf('<button type="button" class="btn btn-primary button-css" onClick="getAttendance(\'%s\');">%s</button> ', $ID[0], $ID[0]);
                }
             ?>
                <!-- </div> -->
            </div> 
            <div id="attendance-panel" style="display: none">
              <div  id="inputDate" >
                <form role="form" method="post" id="attendance-date-form" action="ClassList.php" enctype="multipart/form-data">
                  <div class="form-group col-md-5">
                    <label>Please select Date for class:</label>
                    <select id="date-list">
                      
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="row" style="margin-top:15px; display: none" id="attendance-table">
              <div class="col-md-12">
                <div class="well">
                  <h2 class="text-center">Class Attendance</h2>
                  <hr width="70%">
                    <table class="table table-striped" data-toggle="table">
                      <thead>
                        <tr>
                          <th >Student ID</th>
                          <th >First Name</th>
                          <th >Last Name</th>
                          <th >Status</th>
                          <!-- <th data-sortable="true">Class Date</th> -->
                        </tr>
                      </thead>
                      <tbody id="table-body"> 
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/formValidation.min.js"></script>
<script type="text/javascript" src="js/bootstrap-1.js"></script>
<script type="text/javascript" src="js/bootstrap-table.js"></script>
</body>
</html>

<?php
}else{
	 header('Location: LoginPage.php');
}
?>