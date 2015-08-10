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
    <title>Manage Class</title>

    <!-- Bootstrap
    <link href="mycss/manageclass.css" rel="stylesheet"> 
    -->
   

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/Ichnaea/css/main.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/formValidation.css"/>
    <link rel="stylesheet" href="css/message.css"/>
    <link rel="stylesheet" href="css/bootstrap-table.css"/>
    
  </head>
  <body style="margin-top: 60px;
  			   background-image: url(pictures/manage-class-background.jpg);
           background-repeat: no-repeat;
           background-size: cover">
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
                <li >
                  <a href="viewAttendance.php">View Attendance  </a>
                  
                </li>
                <li class="active"><a href="">Add New Class</a></li>
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
      <div class="row ">
        <!-- <nav class="col-md-2"> -->
  		    <!-- <div class="panel panel-default col-md-2 col-sm-2 span7 text-center" >
            <div class="panel-body">
               <button type="button" class="btn btn-success button-css" id="addClassBtn" onclick="createClass()">Add Class</button>
            </div>
          </div>   -->

          <div class="panel panel-default col-md-offset-2 col-md-8 col-sm-10" id="activity-panel">
            <div class="panel-body">
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
                <form role="form" method="post" id="create-class-form" action="ClassList.php" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="firstName" class="control-label">ClassID</label>
                        <div class="input-group input-fields" >
                          <input type="text" class="form-control" id="ClassID" name="ClassID">
                        </div>
                    </div>


                    <div class="form-group col-md-5">
                      <label for="instructorID">instructorID</label>
                      <input class="form-control input-fields" type="text" id="instructorID" name="instructorID" value=<?php echo $_SESSION['Email']?> disabled > </input>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="startDate">Start Date</label>
                      <div class="input-group input-fields">
                        <input class="form-control" type="date" id="startDate" name="startDate"> </input>
                      </div>
                    </div>
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="endDate">End Date</label>
                      <div class="input-group input-fields">
                        <input class="form-control" type="date" id="endDate" name="endDate"> </input>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="startTime">Start Time</label>
                      <div class="input-group input-fields">
                        <input class="form-control" type="time" id="startTime" name="startTime"> </input>
                      </div>
                    </div>
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="endTime">End Time</label>
                      <div class="input-group input-fields">
                        <input class="form-control" type="time" id="endTime" name="endTime"> </input>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="cutOffTime">Cut Off Time</label>
                      <div class="input-group input-fields">
                        <input class="form-control" type="time" id="cutOffTime" name="cutOffTime"> </input>
                      </div>
                    </div> 
                    <div class="form-group col-md-5 no-padding-right">
                      <label for="Days">Upload Student CSV</label>
                      <div class="input-group input-fields">
                        <span class="input-group-btn">
                            <span class="btn btn-primary btn-file">
                                Browse <input type="file" name="inputFile">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                 
                  <div class="form-group col-md-10">
                    <label for="Days">Days</label>
                    <!-- <input class="form-control" type="text" id="days" name="days"> </input> -->
                    <div>
                      <div class="checkbox-inline">
                        <label class="checkbox-font-weight" style="margin-left: 10px"><input type="checkbox" value="Monday" name="day[]">Monday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Tuesday" name="day[]">Tuesday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Wednesday" name="day[]">Wednesday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Thursday" name="day[]">Thursday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Friday" name="day[]">Friday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Saturday" name="day[]">Saturday</label>
                      </div>
                      <div class="checkbox-inline">
                         <label class="checkbox-font-weight"><input type="checkbox" value="Sunday" name="day[]">Sunday</label>
                      </div>
                    </div>

                    <div class="form-group col-md-5" style="padding-left: 0px;padding-top: 15px;margin-bottom: 0px;">
                      <button type="submit" class="btn btn-primary" name="SubmitLoginPage">Create Class</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>  
        <!-- </nav> -->
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/formValidation.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-1.js"></script>
    <script type="text/javascript" src="js/bootstrap-table.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#create-class-form").formValidation({
          message: 'This value is not valid',
          icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields:{
            ClassID: {
              validators:{
                notEmpty: {
                  message: 'The ClassID is required and cannot be left empty'
                },
                regexp: {
                  regexp: /^\S+$/,
                  message: "The ClassID cannot have blank spaces."
                }
              }
            },
            cutOffTime: {
              validators:{
                notEmpty: {
                  message: 'The cutoff time is required and cannot be left empty'
                }
              }
            },
            startDate: {
              validators:{
                notEmpty: {
                  message: 'The cutoff time is required and cannot be left empty'
                }
              }
            },
            endDate: {
              validators:{
                notEmpty: {
                  message: 'The cutoff time is required and cannot be left empty'
                }
              }
            },
            endTime: {
              validators:{
                notEmpty: {
                  message: 'The cutoff time is required and cannot be left empty'
                }
              }
            },
            startTime: {
              validators:{
                notEmpty: {
                  message: 'The cutoff time is required and cannot be left empty'
                }
              }
            },
            inputFile: {
              validators:{
                notEmpty: {
                  message: 'Please add path to a file'
                }
              }
            },
            day: {
              validators: {
                  notEmpty: {
                      message: 'You have to accept the terms and policies'
                  }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>

<?php

  
}else{
  header('Location: LoginPage.php');
}

?>

