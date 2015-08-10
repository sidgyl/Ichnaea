<?php
	include_once 'includes/DBconnection.php';
    session_start();
    //set up mysql connection
    mysql_connect("localhost", "root", "") or die(mysql_error());
    //select database
    mysql_select_db("ichnaea") or die(mysql_error());

    $classID = $_POST['ClassID'];
    $instructorID=$_POST['instructorID'];

    echo $classID;
    echo $instructorID;

    $myDBconnection = new DBconnection();
    $myDBconnection->ConnectToDB(); 

    $myresponse =  $myDBconnection->db->prepare('DELETE FROM class WHERE CLASSID =\''.$classID.'\' AND INSTRUCTOR_ID=\''.$instructorID."'");
    $myresponse->execute();
    
    $myresponse1 =  $myDBconnection->db->prepare("DROP TABLE ".$classID.";");
    $myresponse1->execute();

    $myresponse2 =  $myDBconnection->db->prepare('DELETE FROM students WHERE CLASSID =\''.$classID.'\';');
    $myresponse2->execute();      

    $_SESSION['successMessage'] = "The class was successfully deleted";
    header('Location: editClass.php');


?>