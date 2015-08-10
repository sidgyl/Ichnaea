<?php
	include_once 'DBconnection.php';

	$classID = $_GET['classID'];

	$myDBconnection = new DBconnection();
  	$myDBconnection->ConnectToDB();	
  	// echo $classID.'<br>';
	  $myresponse =  $myDBconnection->db->prepare('SELECT DISTINCT class_date FROM '.$classID);
  	$myresponse->execute();
  	$result = $myresponse->fetchAll();

  	$output = array();
  	// echo json_encode($result);
  	foreach ($result as $row) {
		array_push($output, $row['class_date']);
  	}
  	// echo $myresponse->rowCount();
  	// echo $result[0]['class_date'];
  	// return json_encode($myresponse->rowCount());
  	echo json_encode($output);
  	// echo '<br>'.$output[0];
	 
?>