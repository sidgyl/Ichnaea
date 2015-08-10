<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instructor Registration Page</title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/formValidation.css"/>
    <link rel="stylesheet" href="css/message.css"/>

  </head>
  <body style="
    background-image: url(pictures/register-background.jpg);
    background-repeat: no-repeat;
    background-size: cover;
">
    <p><br/></p>
	<div class="row">
  		<div class="col-md-2"></div>
  		<div class="col-md-8">
  			<div class="panel panel-default">
  				<div class="panel-body">
    					<div class="page-header" style="margin-top:5px;">
    						<h3>Instructor Registration Page</h3>
    					</div>
              <?php
                session_start();
                if (isset($_SESSION['errorMessage'])) {
                  echo '<p class="isa_error" style="text-align: center"> '. $_SESSION["errorMessage"] .'</p>';
                  unset($_SESSION['errorMessage']);
                }
              ?>
    					<form id="registrationForm" class="form-horizontal" role="form" method="post" action="includes/Registration.php">
    						<div class="form-group">
      							<label for="firstName" class="col-sm-2 control-label">First Name</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        								<input type="text" class="form-control" id="firstName" placeholder="First Name" name="FirstName">
        							</div>
      							</div>
    						</div>
                              
                <div class="form-group">
      							<label for="lastName" class="col-sm-2 control-label">Last Name</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        								<input type="text" class="form-control" id="lastName" placeholder="Last Name" name="LastName">
        							</div>
      							</div>
    						</div>    
                              
    						<div class="form-group">
      							<label for="inputEmail" class="col-sm-2 control-label">Email</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon">@</span>
        								<input type="email" class="form-control" id="inputEmail" placeholder="Email" name="Email">
        							</div>
      							</div>
    						</div>

    						<div class="form-group">
      							<label for="inputPassword" class="col-sm-2 control-label">Password</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
        								<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="Password">
        							</div>
      							</div>
    						</div>
                              
                <div class="form-group">
      							<label for="retypePassword" class="col-sm-2 control-label">Re-Type Password</label>
      							<div class="col-sm-10">
      								<div class="input-group">
      									<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
        								<input type="password" class="form-control" id="retypePassword" placeholder="Re-type Password" name="ReTypePassword">
        							</div>
      							</div>
    						</div>
                              
    						<div class="form-group">
      							<div class="col-sm-offset-2 col-sm-10">
        							<button type="submit" class="btn btn-primary">Register</button>
        							<button type="button" class="btn btn-success" onclick="location.href ='LoginPage.php';">Back to Login</button>
      							</div>
    						</div>
					    </form>
  				</div>
			</div>
  		</div>
  		<div class="col-md-2"></div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/formValidation.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-1.js"></script>

    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#registrationForm").formValidation({
          message: 'This value is not valid',
          icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields:{
            FirstName: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required'
                    }
                }
            },
            LastName: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                }
            },
            Email:{
              validators: {
                notEmpty: {
                  message: 'The email address is required and cannot be left empty'
                },
                emailAddress: {
                  message: 'The input is not a valid email address'
                }
              }
            },
            Password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            ReTypePassword:{
              validators:{
                notEmpty:{
                  message: 'Please re type the password'
                },
                identical:{
                  field: 'Password',
                  message: 'It should match the password'
                }
              }
            }
          }
        });
      });
    </script>
    
  </body>
</html>
