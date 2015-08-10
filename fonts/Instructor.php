<?php
class Instructor
{
  private $IFirstNane;
  private $ILastNane;
  private $IEmailAdd;
  private $IPassword;
  
  
  function __construct($myIFirstNane, $myILastNane, $myIEmailAdd, $myIPassword){
  
  	$this->IFirstNane = $myIFirstNane;
  	$this->ILastNane = $myILastNane;
  	$this->IEmailAdd = $myIEmailAdd;
  	$this->IPassword = $myIPassword;
  	
  }
  
  public function Insertion($mydb){
  	
  	//$myresponse =  $mydb->prepare('SELECT * FROM instructor WHERE Email=?');
  	//$myresponse->execute(array($this->IEmailAdd));
  	$IsalreadyPresent = $this->Selection($mydb);
  	$myquery = 0;
  	if($IsalreadyPresent==0) {
  		$myquery = $mydb->prepare('INSERT INTO instructor VALUES(:FName, :LName, :pwd, :Emails)');
  		$myquery->execute(array(
  			'FName' => $this->IFirstNane,
  			'LName' => $this->ILastNane,
  			'pwd' => $this->IPassword,
  			'Emails' => $this->IEmailAdd,
  		));
  		
  		if(!$response){//error inserting
  			$myquery = 1;
  		}
  		
  	}
  	else {
  		$myquery = 2;
  	}
  	return $myquery;
  	
  }
  
  public function Selection($mydb){
  	 
  	$myresponse =  $mydb->prepare('SELECT * FROM instructor WHERE Email=?');
  	$myresponse->execute(array($this->IEmailAdd));
  	
  	return $myresponse->rowCount();
  	 
  }
  
}