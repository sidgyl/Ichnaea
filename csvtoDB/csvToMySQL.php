<?php
// http://www.ssdtutorials.com/tutorials/title/insert-records-database.html

//http://www.infotuts.com/import-csv-file-data-in-mysql-php/

	$connect = mysql_connect("129.107.132.32", "root", "Laelaps") or die (mysql_error());
	//ERRORS
	//A connection attempt failed because the connected party did not 
	//properly respond after a period of time, or established connection failed because connected host has failed to respond

	mysql_select_db("ichnaea", $connect); // ERROR 2: expects parameter 2 to be resource, boolean given 

	if(isset($_POST['Submit']))
	{
		$file = $_FILES['file']['tmp_name'];

		$messageHandler = fopen($file, "r");
		while(($fileOpen = fgetcsv($messageHandler, 1000, ",")) !== false)
		{
			$StudentID = $fileOpen[0];
			$Status = $fileOpen[1];
			$ClassDate = $fileOpen[2];
			$Fname = $fileOpen[3];
			$Lname = $fileOpen[4];

			$sql = mysql_query("INSERT INTO CSE4317 VALUES ('$StudentID', '$Status', 'ClassDate', 'Fname', 'Lname')");
		
		}
			if($sql)
			{
				echo 'File has been uploaded SUCCESSFULLY';
			}
			else
			{
				echo 'File was NOT able to be uploaded';
			}

	}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Upload CSV to MySQL</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<section id="wrapper">	
	
	<form action="" method="post" enctype="multipart/form-data">
	
		<table cellpadding="0" cellspacing="0" border="0" class="table">
			<tr>
				<th><label for="file">Select file</label> </th>
			</tr>
			<tr>
				<td><input type="file" name="file" id="file" size="30" /></td>
			</tr>
			<tr>
				<td><input type="submit" id="btn" class="fl_l" value="Submit" /></td>
			</tr>
		</table>
		
	</form>
	
</section>

</body>
</html>


