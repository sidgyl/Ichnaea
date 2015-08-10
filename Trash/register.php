<?php

$localhost = 'localhost';//	PLEASE PLEASE CHANGE THIS ACCORDINGLY129.107.132.27
$SeverUserName = 'root';//Ichnaea
$password = 'Laelaps';

// Establishing connection with server..PDO
 $connection = mysql_connect("$localhost", "$SeverUserName", "$password");

// Check connection
 if ($connection->connect_error) {
 	die("Connection failed: " .$connect_error);
 }


// Selecting Database 
 $db = mysql_select_db("ichnaea", $connection);

//Fetching Values from URL  
$FName=$_POST['FirstName'];
$LName=$_POST['LastName'];
$username=$_POST['Email'];
$pswrd= sha1($_POST['Password']);  // Password Encryption, If you like you can also leave sha1
$Retypepassword= $_POST['RetypePassword'];


// check if e-mail address syntax is valid or not
$username = filter_var($username, FILTER_SANITIZE_username); // sanitizing username(Remove unexpected symbol like <,>,?,#,!, etc.)

if (!filter_var($username, FILTER_VALIDATE_username))
 {
    echo "Invalid username.......";
 }
else
 {
	$result = mysql_query("SELECT * FROM instructor WHERE username='$username'");
        $data = mysql_num_rows($result);
	        
	if(($data)==0)
      {
		//Insert query 
	   $query = mysql_query("insert into instructor values ('$FName', 'LName' '$username', '$pswrd')");
		if(($query))
		   {
			  echo "You have Successfully Registered.....";
		   }
		else
		   {
			  echo "Error....!!";   
		   }
	} 
	else
	{
		echo "This username is already registered, Please try another username...";
	}  
 }
 
//connection closed
mysql_close ($connection);
?>