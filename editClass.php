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
	    <title>Edit Class</title>
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
            <li ><a href="viewAttendance.php">View Attendance </a></li>
            <li ><a href="ManageClass.php">Add New Class</a></li>
            <li class="active"><a href="">Edit Class</a></li>
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
      <div class="panel panel-default col-md-12 row">
        <div class="col-md-2 col-sm-2 span7 text-center" >
          <?php
            $myDBconnection = new DBconnection();
            $myDBconnection->ConnectToDB();

            $instructor = new Instructor("", "", "", $_SESSION['Email']);
            $response = $instructor->getAllClasses($myDBconnection->db, $_SESSION['Email']);
            foreach ($response as $ID){
              printf('<button type="button" class="btn btn-primary button-css" onClick="editClass(\'%s\')">%s</button> ', $ID[0], $ID[0]);
            }
            
          ?>
        </div>
        <?php
          // session_start();
          if (isset($_SESSION['errorMessage'])) {
            echo '<p class="isa_error" style="text-align: center"> '. $_SESSION["errorMessage"] .'</p>';
            unset($_SESSION['errorMessage']);
          }else if (isset($_SESSION['successMessage'])) {
            // echo $_SESSION["successMessage"];
            echo '<p class="isa_success" style="text-align: center"> '. $_SESSION["successMessage"] .'</p>';
            unset($_SESSION['successMessage']);
          }
        ?>
        <form class="col-md-9" role="form" method="post" id="edit-class-form" enctype="multipart/form-data" style="display:none;">
                <div class="form-group col-md-5">
                    <label for="classID">Class ID</label>
                    <input class="form-control" type="text" id="editClassID" name="ClassID" value="" readonly placeholder=""> </input>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="instructorID">instructorID</label>
                    <input class="form-control" type="text" id="instructorID" name="instructorID" value=<?php echo $_SESSION['Email']?> readonly ></input>
                  </div>
                  <div class="form-group col-md-5">
                    <label id="start-date" for="startDate"></label>
                    <input class="form-control" type="date"  id="startDate" name="startDate"> </input>
                  </div>
                  <div class="form-group col-md-5">
                    <label id="end-date" for="endDate"></label>
                    <input class="form-control" type="date" id="endDate" name="endDate" > </input>
                  </div>
                 <div class="form-group col-md-5">
                    <label id="start-time" for="startTime"></label>
                    <input class="form-control" type="time" id="startTime" name="startTime"</input>
                  </div>
                  <div class="form-group col-md-5">
                    <label id="end-time" for="endTime"></label>
                    <input class="form-control" type="time" id="endTime" name="endTime"> </input>
                  </div>
                  <div class="form-group col-md-5">
                    <label id="cut-off-time" for="cutOffTime"></label>
                    <input class="form-control" type="time" id="cutOffTime" name="cutOffTime"> </input>
                  </div> 

                  <div class="form-group col-md-10">
                    <label for="Days">Days</label>
                    <!-- <input class="form-control" type="text" id="days" name="days"> </input> -->
                    <div>
                      <div class="checkbox-inline">
                        <label class="checkbox-font-weight" style="margin-left: 10px"><input type="checkbox" value="Monday" name="day[]" <?php  
                          // if(in_array("Monday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>
                        >Monday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Tuesday" name="day[]" <?php  
                          // if(in_array("Tuesday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Tuesday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Wednesday" name="day[]" <?php  
                          // if(in_array("Wednesday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Wednesday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Thursday" name="day[]" <?php  
                          // if(in_array("Thursday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Thursday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Friday" name="day[]" <?php  
                          // if(in_array("Friday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Friday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Saturday" name="day[]" <?php  
                          // if(in_array("Saturday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Saturday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Sunday" name="day[]" <?php  
                          // if(in_array("Sunday", $exDays))
                            // echo "checked = \"checked\"";
                        ?>>Sunday</label>
                      </div>
                    </div>

                    <div class="form-group col-md-10" style="padding-left: 0px;padding-top: 15px;margin-bottom: 0px;">
                      <button type="submit" class="btn btn-primary" name="UpdateClassPage" formaction = "updateClass.php">Update Class</button>
                      <button type="submit" class="btn btn-success" name="AddStudentPage" formaction = "addStudent.php" >Add Students</button>
                      <button type="submit" class="btn btn-warning" name="RemoveStudentPage" formaction="removeStudent.php">Remove Students</button>
                      <button type="submit" class="btn btn-danger" name="DeleteClassPage" formaction="deleteClass.php">Delete Class</button>
                    </div>
                  </div>
            </form>
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