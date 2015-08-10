<?php
class csvClass{
	private $studentID;
	private $classID;
	private $fname;
	private $lname;
  private $RFID;
  private $attendance;

	function __construct(
			$mystudentID,
			$myclassID,
			$myfname,
			$mylname,
      $myRFID,
      $myattendance
			){

		$this->studentID 	= $mystudentID;
		$this->classID		= $myclassID;
		$this->fname		  = $myfname;
		$this->lname		  = $mylname;
    $this->RFID       = $myRFID;
		$this->attendance = $myattendance;

	}

  public function Selection($mydb){
    $myresponse =  $mydb->prepare('SELECT * FROM studentS WHERE RFID=? and CLASSID=?');
    $myresponse->execute(array($this->RFID, $this->classID));
    
    return $myresponse;
  }

	public function Insertion($mydb){  	
  	
  	 
  	$myquery =  $mydb->prepare(
  			'INSERT INTO STUDENTS VALUES(
									:mystudentID,
									:myclassID,
									:myfname,
									:mylname,
                  :myRFID,
                  :myattendance

  										)');

  	$myquery->execute( array(
  							'mystudentID'		 =>	$this->studentID,
  							'myclassID'    =>  $this->classID,
  							'myfname'      =>  $this->fname,
  							'mylname'    =>  $this->lname,
                'myRFID'      =>  $this->RFID,
                'myattendance' => $this->attendance

  								));

  	if($myquery){
  			$myresponse = 1; //successfull insertion
  		}
  	// }
  	else {
  		$myresponse = 2;	//Account already exit
  	}
  	return $myresponse;
  }
}


?>