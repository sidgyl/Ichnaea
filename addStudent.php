<?php
include_once 'includes/DBconnection.php';
include_once 'includes/Instructor.php';
session_start();
if ($_SESSION['validCredentials']) {

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Add New Students</title>
	    <!-- Bootstrap <link href="mycss/manageclass.css" rel="stylesheet"> -->
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	    <link type="text/css" rel="stylesheet" href="/Ichnaea/css/main.css">
	    <!-- Optional theme -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	    <link rel="stylesheet" href="css/formValidation.css"/>
	    <link rel="stylesheet" href="css/message.css"/>
	    <link rel="stylesheet" href="css/bootstrap-table.css"/>
	</head>

<body style="margin-top: 60px;">
	<div class="continer">
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
                <li >
                  <a href="viewAttendance.php">View Attendance  </a>
                  
                </li>
                <li ><a href="">Add New Class</a></li>
                <li ><a href="editClass.php">Edit Class</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="#" class="dropdown-toggle" text-align="right" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['name'] ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="includes/destroySession.php" >Logout</a></li>
                <!--     <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li> -->
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    	<div class="panel panel-default col-md-10">
    		<?php
    			if (isset($_SESSION['errorMessage'])) {
		            echo '<p class="isa_error" style="text-align: center"> '. $_SESSION["errorMessage"] .'</p>';
		            unset($_SESSION['errorMessage']);
	            }else if (isset($_SESSION['successMessage'])) {
		          	echo '<p class="isa_success" style="text-align: center"> '. $_SESSION["successMessage"] .'</p>';
		            unset($_SESSION['successMessage']);
	          	}

	          	$classID='';
				if (isset($_POST['ClassID'])) {
					$classID = $_POST['ClassID'];
					$_SESSION['ClassID'] = $classID;
					// unset($_SESSION['classID']);
				}else{
					$classID = $_SESSION['ClassID'];
				}

    		?>
	        <form id="addStudentForm" class="form-horizontal" role="form" method="post">
				<div class="form-group col-md-10">
					<div class="row">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-apple"></span></span>
							<input type="text" class="form-control" id="classID" value=<?php echo $classID ?> name="classID" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
							<input type="text" class="form-control" id="studentID" placeholder="Student ID" name="StudentID">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control" id="firstName" placeholder="First Name" name="FirstName">	
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control col-md-2" id="lastName" placeholder="Last Name" name="LastName">
							<span class="input-group-addon"><span class="glyphicon glyphicon-qrcode"></span></span>
							<input type="text" class="form-control" id="RFID" placeholder="RFID" name="RFID">
						</div>
						<!-- <div class="form-group">
      							<label for="firstName" class="col-sm-2 control-label">First Name</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        								<input type="text" class="form-control" id="firstName" placeholder="First Name" name="FirstName">
        							</div>
      							</div>
    						</div>
						<div class="form-group">
  							<label for="firstName" class="col-sm-2 control-label">First Name</label>
  							<div class="col-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
    								<input type="text" class="form-control" id="firstName" placeholder="First Name" name="FirstName">
    							</div>
  							</div>
						</div> -->
					</div>
				</div>
				<button type="submit" class="btn btn-primary col-md-3" name="addRow" formaction="insertStudent.php">Add Another Student</button>
			</form>
		</div>
	</div>
<?php
}else{
  header('Location: LoginPage.php');
}

?>