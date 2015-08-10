<?php
class Attendance
{
	//private $ClassName;
	private $StudentID;
	private $Status;
	//private $SFname;
	//private $SLname;
	private $ClassDate;
	

	
	//function __construct($myDays){$this->Days			= $myDays;}
	
	function __construct(
			$myStudentID,
			$myStatus,
			$myClassDate
			){
		$this->StudentID	= $myStudentID;
		$this->Status		= $myStatus;
		//$this->SFname		= $mySFname;
		//$this->SLname		= $mySFname;
		$this->ClassDate	= $myClassDate;
	}
//SET @SQLQuery = 'SELECT * FROM ' + @TableName + ' WHERE EmployeeID = @EmpID' 
	
public static function CreateTable($mydb, $ClassName){
  	
	  	$myTable =  $mydb->prepare(
	  		'CREATE TABLE IF NOT EXISTS '.$ClassName.'
	  		(
											STUDENTID VARCHAR(30) NOT NULL,
											STATUS VARCHAR(1) DEFAULT "A",
											CLASS_DATE DATE NOT NULL,
											PRIMARY KEY(STUDENTID, CLASS_DATE)
									)'
	  	);

	  	$myTable->execute();
	  	
  	}	

	public function Selection($mydb){
  	
	  	$myresponse =  $mydb->prepare('SELECT * FROM class');
	  	$myresponse->execute();
	  	
	  	return $myresponse->rowCount();
  	 
  	}
//CREATE TABLE IF NOT EXISTS
  
  public function Insertion($mydb){

  	$IsalreadyPt = $this->Selection($mydb);
  	$myresponse = 0;		//error inserting
  	if($IsalreadyPresent->rowCount() ==0) {
  	 
  		$myresponse =  $mydb->prepare(
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

  		$myresponse->execute( array(
  							'myInstructorID' =>  $this->InstructorID,
  							'myStartTime'    =>  $this->StartTime,
  							'myEndTime'      =>  $this->EndTime,
  							'myStartDate'    =>  $this->StartDate,
							'myEndDtate'     =>  $this->EndDtate,
  							'myCutOffftime'  =>  $this->CutOffftime,
							'myDays'         =>  $this->Days,
  								)
  						);

  		if($myquery){
  			$myresponse = 1; //successfull insertion
  		}
  	}
  	else {
  		$myresponse = 2;	//Account already exit
  	}
  	return $myresponse;

  	}
 


}