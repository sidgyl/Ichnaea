<?php
class Instructor
{
  private $IFirstNane;
  private $ILastNane;
  private $IEmailAdd;
  private $IPassword;
  
  
  function __construct($myIFirstNane, $myILastNane, $myIPassword, $myIEmailAdd){
  
  	$this->IFirstNane = $myIFirstNane;
  	$this->ILastNane = $myILastNane;
  	$this->IEmailAdd = $myIEmailAdd;
  	$this->IPassword = $myIPassword;
  	
  }
  
  public function Insertion($mydb){
  	
  	//$myresponse =  $mydb->prepare('SELECT * FROM instructor WHERE Email=?');
  	//$myresponse->execute(array($this->IEmailAdd));
  	$IsalreadyPresent = $this->Selection($mydb);
  	$myresponse = 0;		//error inserting
  	if($IsalreadyPresent->rowCount() ==0) {
  		$myquery = $mydb->prepare('INSERT INTO instructor VALUES(:FName, :LName, :pwd, :Emails)');
  		$myquery->execute(array(
  			'FName' => $this->IFirstNane,
  			'LName' => $this->ILastNane,
  			'pwd' => $this->IPassword,
  			'Emails' => $this->IEmailAdd,
  		));
  		if($myquery){
  			$myresponse = 1; //successfull insertion
  		}
  	}
  	else {
  		$myresponse = 2;	//Account already exit
  	}
  	return $myresponse;
  	
  }

  public function getAllClasses($mydb, $instructorID){
    $myresponse =  $mydb->prepare('SELECT CLASSID FROM class WHERE INSTRUCTOR_ID=?');
    $myresponse->execute(array($instructorID));
    
    return $myresponse;
  }
  
  public function Selection($mydb){
  	
  	$myresponse =  $mydb->prepare('SELECT * FROM instructor WHERE EMAIL=?');
  	$myresponse->execute(array($this->IEmailAdd));
  	
  	return $myresponse;
  	 
  }


  public function Selection1($mydb){
    
    $myresponse =  $mydb->prepare('SELECT * FROM instructor WHERE EMAIL=?');
    $myresponse->execute(array($this->IEmailAdd));
    
    return $myresponse;
     
  }

  public function getClassData($mydb, $classID, $instructorID){
    $myresponse = $mydb->prepare('SELECT * FROM class WHERE CLASSID=? AND INSTRUCTOR_ID=?');
    $myresponse->execute(array($classID, $instructorID));

    return $myresponse;
  }
  
}