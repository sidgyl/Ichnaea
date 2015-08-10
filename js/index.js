function createClass(){
	$("#create-class-form").show();
	$("#addClassBtn").attr("class","btn btn-success button-css");
	$("#editClassBtn").attr("class", "btn btn-primary button-css");
}

function editClass(classid){
	$("#editClassID").attr('value',classid);
  $("#editClassID").attr('placeholder', classid);
  $("#edit-class-form").show();
  $("#start-date").empty();
  $("#end-date").empty();
  $("#start-time").empty();
  $("#end-time").empty();
  $("#cut-off-time").empty();
  $.ajax({
    type: "GET",
    url: "includes/getClassInfo.php",
    data: {classID: classid},
    dataType: 'json',
    // async: false,
  })
  .done(function(data){
    console.log(data);
    var temp = data.classData[0].STARTDATE;
    $('#start-date').append("Start Date (Old Start Date: "+data.classData[0].STARTDATE+")");
    $('#end-date').append("End Date (Old End Date: "+data.classData[0].ENDDATE+")");
    $('#start-time').append("Start Time (Old Start Time: "+data.classData[0].STARTTIME+")");
    $('#end-time').append("End Time (Old End Time: "+data.classData[0].ENDTIME+")");
    // $('#end-time').append(" "+data.classData[0].ENDTIME+")");
    $('#cut-off-time').append("Cut Off Time (Old Cutt Off Time: "+data.classData[0].CUTOFFTIME+")");
  })
}

function getAttendance(classid){
  $("#date-list").empty();
  $.ajax({
    type: "GET",
    url: "includes/getClassDates.php",
    data: {classID: classid},
    dataType: 'json',
    // async: false,
  })
  .done(function(data){
    //console.log(data);
    $("#date-list").append('<option value="Select Date">Select Date</option>');
    for (var i = 0; i < data.length; i++) {
      $("#date-list").append('<option value="'+ classid+'">'+ data[i] +'</option>');
    };
    
  })

  $("#table-body").empty();
  $("#create-class-form").hide();
  $("#attendance-panel").show();

}

$('#date-list').change(function() {
  $("#attendance-table").show();
  var classid = $("#date-list option:selected").val();
  var date = $("#date-list option:selected").text();
  if (date != "Select Date") {
    $.ajax({
      type: "POST",
      url: "includes/getAttendance.php",
      data: {classID: classid, classDate: date},
      dataType: 'json',
    })
    .done(function (data){
      var roster = data.roster;
      var classAttendance = data.attendaceTable;
      var displayData = [];
      for (var i = 0; i < roster.length; i++) {
        var stdnt = rosterCheck(roster[i], classAttendance);
        if (false == stdnt) {
          displayData.push(data.roster[i]);
        }else{
          // displayData.push({'studentID': stdnt.studentID, 'fname':data.roster[i].fname, 'lname': data.roster[i].lname, 'status': stdnt.status, 'class_date': stdnt.CLASS_DATE});
          displayData.push(stdnt);
        }
      };
      // console.log(data[0]);

      $("#table-body").empty();
      // $("#create-class-form").hide();
      // $("#attendance-panel").show();
      for (var i = 0; i < displayData.length; i++) {
        $("#table-body").append('<tr>'+
                                '<td>'+displayData[i]['STUDENTID']+'</td>'+
                                '<td>'+displayData[i]['FNAME']+'</td>'+
                                '<td>'+displayData[i]['LNAME']+'</td>'+
                                // '<td>'+displayData[i]['STATUS']+'</td>'+
                                '<td>'+displayData[i]['ATTENDANCE']+'</td>'+
                              '</tr>');
      };



    });
  };   
});

function rosterCheck(rosterName, attendanceTable){
  for (var i = 0; i < attendanceTable.length; i++) {
    if(rosterName.RFID == attendanceTable[i].STUDENTID){
      rosterName.ATTENDANCE = attendanceTable[i].STATUS;
      return rosterName;
    }
  };

  return false;
}

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
