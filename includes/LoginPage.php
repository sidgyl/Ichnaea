<?php
// Start the session
session_start();

$_SESSION["ValidCredentials"] = false;
$_SESSION["Init"] = true;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instructor Login</title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background:#eee;">
    
    <div class="container">
    		<p><br/></p>
  		<div class="row">
  			<div class="col-md-6"></div>
  			<div class="col-md-6">
  				<div class="panel panel-default">
  					<div class="panel-body">
    						<div class="page-header">
  							<h3>Instructor Login</h3>
						</div>
						<form role="form" method="post" 

                  
action="LoginPage.php"
                  
                  <?php
                    // if($_SESSION["Init"]){
                    //     echo 'action="Login.php"';
                    //     $_SESSION["Init"] = false;
                    // }
                    // elseif($_SESSION["ValidCredentials"])
                    //        echo 'action="ManageClass.php"';
                    //     else
                    //       echo 'action="Login.php"';
                  ?>


                  >
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
  							<hr/>
  							<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> New Instructor</button>
  							<button type="submit" class="btn btn-primary" name="SubmitLoginPage"><span class="glyphicon glyphicon-lock"></span> Login</button>
                <button type="button" class="btn btn-success">Forget Password</button>
  							<p><br/></p>
						</form>
  					</div>
				</div>
  			</div>
		</div>
    </div>

    <?php
                if(isset($_POST['SubmitLoginPage']))   
                        echo 'hhhhhhhhhhhhhhhhhhhhhhh'.$_SESSION["ValidCredentials"];
                   
                  ?>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>