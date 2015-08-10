<?php

//include_once 'includes/ManageClass.html';
include_once 'includes/DBconnection.php';
include_once 'includes/InstructorClass.php';
include_once 'includes/csvClass.php';
include_once 'Attendance.php';
		
		$myDBconnection = new DBconnection();
		$myDBconnection->ConnectToDB();
		$myDBconnection->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		session_start();
		// echo  $_SESSION['Email'];
		echo $_POST['ClassID'];

		$counter = 0;
		$classDay = "";
		$dayArray = $_POST['day'];
		while($counter < count($dayArray))
		{
			$classDay = $classDay.$dayArray[$counter].",";
			$counter = $counter + 1;
		}
		$classDay = substr($classDay, 0, -1);

		$newClass = new instructorClass($_POST['ClassID'], $_SESSION['Email'], $_POST['startTime'],$_POST['endTime'],
			$_POST['startDate'], $_POST['endDate'], $_POST['cutOffTime'], $classDay);

		echo $newClass->GetClassID();

		$selectClass = $newClass->Selection($myDBconnection->db);

		$rowcnt = $selectClass->rowCount();
		// echo mysql_num_rows($selectClass);

		if ($rowcnt == 0) {
			$response = $newClass->Insertion($myDBconnection->db);

			if(($response <=1))
				if ($response == 0)
					echo "Error inserting in the DB";
				else {

					Attendance::CreateTable($myDBconnection->db, $newClass->GetClassID());
					echo "New Attendance table successfully created<br>";

				}
			else
				echo "Account already exist";  


			$file = $_FILES['inputFile']['tmp_name'];

			echo "File opened "."<br>".$_POST['ClassID'];

			$messageHandler = fopen($file, "r");
			while(($fileOpen = fgetcsv($messageHandler, 1000, ",")) !== false)
			{	
				$StudentID = $fileOpen[0];
				//echo $StudentID;
				$classID = $_POST['ClassID'];
				//echo $Status;
				$Fname = $fileOpen[1];
				$Lname = $fileOpen[2];
				$RFID = $fileOpen[3];
				$attendance = $fileOpen[4];
				$student = new csvClass($StudentID, $classID, $Fname, $Lname, $RFID, $attendance);
				$result = $student->Selection($myDBconnection->db);
				echo $RFID."<br>";

				
				// $mycsvClass = new csvClass($StudentID, $classID, $Fname, $Lname, $RFID);
				if ($result->rowCount() == 0) {
					echo "rowcount 0";
					$response = $student->Insertion($myDBconnection->db);
				}
	  			
				//echo 'File has been uploaded SUCCESSFULLY';

			}

			
			if(($response <=1))
				if ($response == 0)
					echo "Error inserting students in the DB";
				else 
					echo "You have added students to the class";	
		}else{
			$_SESSION['errorMessage'] = "Class already exists in the database";
		}

		if (!(isset($_SESSION['essorMesasge']))) {
			$_SESSION['successMessage']	= 'The class '.$classID.' and students were sucessfully added to the database';
		}
		// echo 'The class '.$classID.' and students were sucessfully added to the database';
		$myDBconnection->closeConnection();
		header('Location: ManageClass.php');

?>