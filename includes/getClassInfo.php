<?php
    //hard-coded class ID
    // $classID = "CSE4317";
    include_once 'DBconnection.php';
    include_once 'Instructor.php';
    session_start();

    $classID = $_GET['classID'];
    $myDBconnection = new DBconnection();
    $myDBconnection->ConnectToDB();

    $classInfo = [];
    $myresponse = $myDBconnection->db->prepare('SELECT * FROM CLASS WHERE CLASSID="'.$classID.'";');
    $myresponse->execute();
    $result = $myresponse->fetchAll();

    // $myresponse =  $myDBconnection->db->prepare("SELECT * FROM ".$classID." where class_date='".$classDate."';");
    // $myresponse->execute();
    // $result = $myresponse->fetchAll();
    // $instructor = new Instructor("", "", "", $_SESSION['Email']);
    // $response = $instructor->getClassData($myDBconnection->db, $classID, $_SESSION['Email']);

    // $result = $myresponse->fetchAll();

    $classInfo['email'] = $_SESSION['Email'];
    $classInfo['classID'] = $classID;
    $classInfo['classData'] = $result;
    // $classID['rowCount'] = $myresponse->rowCount();
    echo json_encode($classInfo);
    // foreach ($response as $row)
    // {
    //   $classInfo['instructorID'] = $row['INSTRUCTOR_ID'];
    //   $classInfo['startTime'] = $row['STARTTIME'];
    //   $stp = explode(":", $startTime);
    //   if(intval($stp[0]) > 12)
    //   {
    //     $classInfo['startTime'] = strval(intval($stp[0]) - 12).":".$stp[1]." PM";
    //   }
    //   else if((intval($stp[0]) == 0))
    //   {
    //     $classInfo['startTime'] = strval(intval($stp[0]) + 12).":".$stp[1]." AM";
    //   }
    //   else
    //   {
    //     $classInfo['startTime'] = $stp[0].":".$stp[1]." AM";
    //   }

    //   $classInfo['endTime'] = $row['ENDTIME'];
    //   $stp = explode(":", $endTime);
    //   if(intval($stp[0]) > 12)
    //   {
    //     $classInfo['endTime'] = strval(intval($stp[0]) - 12).":".$stp[1]." PM";
    //   }
    //   else if((intval($stp[0]) == 0))
    //   {
    //     $classInfo['endTime'] = strval(intval($stp[0]) + 12).":".$stp[1]." AM";
    //   }
    //   else
    //   {
    //     $classInfo['endTime'] = $stp[0].":".$stp[1]." AM";
    //   }

    //   $classInfo['startDate'] = $row['STARTDATE'];
    //   $classInfo['exDate'] = explode('-', $startDate);
    //   $classInfo['startDate'] = $exDate[1].'/'.$exDate[2].'/'.$exDate[0];

    //   $classInfo['endDate'] = $row['ENDDATE'];
    //   $exDate = explode('-', $classInfo['endDate']);
    //   $classInfo['endDate'] = $exDate[1].'/'.$exDate[2].'/'.$exDate[0];

    //   $cutOffTime = $row['CUTOFFTIME'];
    //   $stp = explode(":", $cutOffTime);
    //   if(intval($stp[0]) > 12)
    //   {
    //     $cutOffTime = strval(intval($stp[0]) - 12).":".$stp[1]." PM";
    //   }
    //   else if((intval($stp[0]) == 0))
    //   {
    //     $cutOffTime = strval(intval($stp[0]) + 12).":".$stp[1]." AM";
    //   }
    //   else
    //   {
    //     $cutOffTime = $stp[0].":".$stp[1]." AM";
    //   }

    //   $days = $row['DAYS'];
    //   $exDays = explode(",", $days);            
    // }
  ?>