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
	    <title>Remove Students</title>
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
	<div class="conatiner">
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
                <li ><a href="ManageClass.php">Add New Class</a></li>
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
    	<div class="col-md-6 col-md-offset-3">
    		<?php
	          // session_start();
	          if (isset($_SESSION['errorMessage'])) {
	            echo '<p class="isa_error" style="text-align: center"> '. $_SESSION["errorMessage"] .'</p>';
	            unset($_SESSION['errorMessage']);
	          }else if (isset($_SESSION['successMessage'])) {
	          	echo '<p class="isa_success" style="text-align: center"> '. $_SESSION["successMessage"] .'</p>';
	            unset($_SESSION['successMessage']);
	          }

		        mysql_connect("localhost", "root", "") or die(mysql_error());
				mysql_select_db("ichnaea") or die(mysql_error());

				$classID = '';
				if (isset($_SESSION['classID'])) {
					$classID = $_SESSION['classID'];
					// unset($_SESSION['classID']);
				}else{
					$classID = $_POST['ClassID'];
				}

				$query = "SELECT * FROM students WHERE CLASSID = '".$classID."'";
				$myresponse = mysql_query($query);

				if(!$myresponse)
				{
					echo "Error retriving students from database.";
				}
	        ?>
	        <form role="form" method="post" id="delete-student-form" enctype="multipart/form-data">
	        <div class="form-group">
	        <?php
	        	while($row = mysql_fetch_array($myresponse))
	        	{
	        		printf("<div class=\"checkbox\"><label><input type=\"checkbox\" name = \"students[]\" value=\"".$row['STUDENTID']."-".$classID."\">".$row['STUDENTID']." - ".$row['FNAME']." ".$row['LNAME']."</label></div>");
	        	}
	        ?>
	        </div>
	        <div class="container">
	        	<button type="submit" class="btn btn-danger" name="SubmitLoginPage" formaction = "deleteStudent.php">Remove Selected Students</button>
	        </div>
	        </form>

		</div>
	</div>

<?php
}else{
  header('Location: LoginPage.php');
}

?>