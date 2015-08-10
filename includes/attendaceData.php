<?php

Class attendanceData{
	//private $fname;
	//private $lname;
	private $studentID;
	private $status;
	private $classDate;

	function __construct($myfname, $mylname, $mystudentID, $mystatus, $myclassDate){
		//$this->$fname = $myfname;
		//$this->$lname = $mylname;
		$this->$studentID = $mystudentID;
		$this->$status = $mystatus;
		$this->$classDate = $myclassDate;
	}

	public function selecAttendace($mydb, $classID){
		$myresponse =  $mydb->prepare('SELECT * FROM '.$classID.' order by class_date');
		$myresponse->execute(array($this->ClassID));
	  	
	  	return $myresponse;
	}
}

?>