<?php
    include_once 'DBconnection.php';
    include_once 'Instructor.php';  
    if(!isset($_SESSION)){

        session_start();
        $myDBconnection = new DBconnection();
        $myDBconnection->ConnectToDB();

        if (empty($_POST) === false) {

            $Email = $_POST['Email'];       //
            $Password = sha1($_POST['Password']); 

            // echo $Email;
            // echo $Password;

            $myInstructor = new Instructor("","",$Password, $Email);

            $myTracketInst = $myInstructor->Selection($myDBconnection->db);

            $i=0;

            foreach ($myTracketInst as $row) {
                if( ($Email ==  $row['EMAIL']) and  ($Password  == $row['PSWRD'])){
                    
                    if (!isset($_SESSION['count'])) {
                      $_SESSION['count'] = 1;
                    } else {
                      $_SESSION['count']++;
                    }
                    $_SESSION['name'] = $row['FNAME']." ".$row['LNAME'];
                    $_SESSION['Email'] = $Email;
                    $_SESSION['validCredentials'] = true;
                    header('Location: ../ManageClass.php');
                }
                else {
                    $_SESSION['errorMessage'] = "The Username Password Combination was not found in the database";
                    header('Location: ../LoginPage.php');
                }
            }
        }else{
            echo "POST is empty";
        }
    }else{
		echo "session already set";
	}
?>
