<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instructor Login Page</title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/formValidation.css"/>
    <link rel="stylesheet" href="css/message.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <body class="login-page-body">
    
    <div class="container">
    		<p><br/></p>
  		<div class="row">
  			<div class="col-md-0"></div>
  			<div class="col-md-6">
  				<div class="panel panel-default">
  					<div class="panel-body">
  						<div class="page-header">
  							<h3>Instructor Login</h3>
						  </div>  
              <form role="form" method="post" action="includes/Login.php" id="login-form">        
              	<div class="form-group">
              		<label for="exampleInputEmail1">Email</label>
              		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="Email">
              	  </div>
              	</div>
              	<div class="form-group">
              		<label for="exampleInputPassword1">Password</label>
              		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
              			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Password">
              	  </div>
              	</div>
                <!-- <p id="errorMessage" class="isa_error" style="text-align: center"> -->
                <?php
                  session_start();
                  if (isset($_SESSION['errorMessage'])) {
                    echo '<p id="errorMessage" class="isa_error" style="text-align: center">'.$_SESSION['errorMessage'].' </p>';
                    // echo $_SESSION['errorMessage'];
                    unset($_SESSION['errorMessage']);
                  }
                ?>
                <!-- </p> -->

              	<div class="col-md-10" style="padding-left: 0px;">
              	  <button type="button" class="btn btn-success" onclick="location.href ='registrationPage.php';"><span class="glyphicon glyphicon-arrow-left"></span> Sign Up</button>
              	</div>
              	<button type="submit" class="btn btn-primary" name="SubmitLoginPage"><span class="glyphicon glyphicon-lock"></span> Login</button>
              	<p><br/></p>
              </form>
  					</div>
				  </div>
  			</div>
		  </div>
    </div>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/formValidation.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-1.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#login-form").formValidation({
          message: 'This value is not valid',
          icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
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
            }
          }
        });
      });
    </script>
  </body>
</html>