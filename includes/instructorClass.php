<?php
class instructorClass
{
	private $ClassID;
	private $InstructorID;
	private $StartTime;
	private $EndTime;
	private $StartDate;
	private $EndDtate;
	private $CutOffftime;
	private $Days;

	
	//function __construct($myDays){$this->Days			= $myDays;}
	
	function __construct(
			$myClassID,
			$myInstructorID,
			$myStartTime,
			$myEndTime,
			$myStartDate,
			$myEndDtate,
			$myCutOffftime,
			$myDays
			){

		$this->ClassID		= $myClassID;
		$this->InstructorID	= $myInstructorID;
		$this->StartTime	= $myStartTime;
		$this->EndTime		= $myEndTime;
		$this->StartDate	= $myStartDate;
		$this->EndDtate		= $myEndDtate;
		$this->CutOffftime	= $myCutOffftime;
		$this->Days			= $myDays;
		 
	}
//$newClass = new instructorClass($classID, $instructorID, $startTime, $endTime, $startDate, $endDate, $cutOffTime, $days);
			
	
	//function __construct($a){}
	
	

	public  function Selection($mydb){

	  	$myresponse =  $mydb->prepare('SELECT * FROM class WHERE CLASSID =?');
	  	$myresponse->execute(array($this->ClassID));
	  	
	  	return $myresponse;
  	 
  	}

  
  public function Insertion($mydb){
	
  	$IsalreadyPresent = $this->Selection($mydb);
  	$myresponse = 0;		//error inserting
  	if($IsalreadyPresent->rowCount() ==0) {
  	 
  	$myquery =  $mydb->prepare(
  			'INSERT INTO class VALUES(
									:myClassID,
									:myInstructorID,
									:myStartTime,
									:myEndTime,
									:myStartDate,
									:myEndDtate,
									:myCutOffftime,
									:myDays
  										)');

  	$myquery->execute( array(
  							'myClassID'		 =>	$this->ClassID,
  							'myInstructorID' =>  $this->InstructorID,
  							'myStartTime'    =>  $this->StartTime,
  							'myEndTime'      =>  $this->EndTime,
  							'myStartDate'    =>  $this->StartDate,
							'myEndDtate'     =>  $this->EndDtate,
  							'myCutOffftime'  =>  $this->CutOffftime,
							'myDays'         =>  $this->Days,
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

  public function GetClassID(){
  	return "$this->ClassID";
  }
  

}

