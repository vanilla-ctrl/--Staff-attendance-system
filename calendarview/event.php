<?php
include_once("db_connect.php");
$sqlEvents = "SELECT emp_id, attendance_status, time_in, time_out FROM attendance_timesheet LIMIT 20";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['time_in']) * 1000;
	$end = strtotime($rows['time_out']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['emp_id'],
        'title' => $rows['attendance_status'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>