<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Attendance Page</title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/formValidation.css"/>
  </head>
  <body class="attendance-page-body">
    
    <div class="container">
    		<p><br/></p>
  		<div class="row">
  			<div class="col-md-3">
          <div class="panel panel-default"> 
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="pick-date" data-toggle="dropdown" aria-expanded="true">
                Select Viewing Dates:
                <span class="caret"> </span>
                  </button>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="pick-date">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">All dates</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">03/01</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">03/02</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">03/03</a></li>
                  </ul>
            </div>
          </div>
  			</div>

        <div class="col-md-9">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Attendance</div>
              <table class="table">
                <tr><th>Student ID</th><th>Last Name</th><th>First Name</th><th>Status</th></tr>
              </table>
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
  </body>
</html>