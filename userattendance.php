<!-- -------------Starting session----------- -->
<?php
session_start();
// session_regenerate_id();
include 'includes/db.php';

?>

<!-- -------------Time In----------- -->
<?php
// echo session_id();
// echo $_SESSION['fname'];
// echo "connection success";
if (isset($_POST['time_in'])) {
	$emp_id = $_SESSION['emp_id'];
	$fname = $_SESSION['fname'];
	$email = $_SESSION['email'];
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	$shift = mysqli_real_escape_string($conn, $_POST['shift']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time_in = mysqli_real_escape_string($conn, $_POST['time']);
	date_default_timezone_set('Asia/Kolkata');
	$time1 = date("Y-m-d H:i:s");
	// $time1 = $_SESSION['time1'];
	$sql = "insert into attendance_timesheet (emp_id,fname,email,role,shift, date, time_in) values ('$emp_id','$fname','$email','$role','$shift', CURDATE(), CURTIME())";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['shift'] = $_POST['shift'];
		$_SESSION['time'] = $_POST['time'];
		echo $_SESSION['time'];
		echo "Sign In successfully !";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
}
?>
<!-- -------------Time Out----------- -->
<?php
// echo session_id();
// echo $_SESSION['fname'];
// echo "connection success";
if (isset($_POST['time_out'])) {
	$emp_id = $_SESSION['emp_id'];
	$fname = $_SESSION['fname'];
	$time_in = $_SESSION['time'];
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	$shift = mysqli_real_escape_string($conn, $_POST['shift']);
	$date = date('d-m-Y');
	$time_out = mysqli_real_escape_string($conn, $_POST['time']);
	date_default_timezone_set('Asia/Kolkata');
	// echo $date = date('d-m-Y');
	$timeout = date('Y-m-d H:i:s');
	// Finding Difference Between Time_in and Time_out

	$time1 = "$time_in";

	$time2 = "$time_out";

	$diff = abs(strtotime($time2) - strtotime($time1));
	$now = new DateTime;
	echo(date("Y-m-d H:i:s",$diff));

	$years   = floor($diff / (365 * 60 * 60 * 24));
	$months  = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
	$days    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

	$hours   = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));

	$minuts  = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);

	$seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));

	printf(" %d hours, %d minuts\n, %d seconds\n",  $hours, $minuts, $seconds);
	echo $hours;
    $sql = "UPDATE attendance_timesheet SET time_out = '$timeout' WHERE emp_id = '$emp_id' and date=CURDATE()";
	if (mysqli_query($conn, $sql)) {
		echo "Sign Out successfully !";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
		if ($hours>8){
		
		$sql2 ="UPDATE attendance_timesheet SET attendance_status ='Present' WHERE emp_id= '$emp_id'";
		if (mysqli_query($conn, $sql2)) {
			echo "You are Present";
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		
	}
	else{
		$sql3 ="UPDATE attendance_timesheet SET attendance_status ='Absent' WHERE emp_id= '$emp_id'";
		if (mysqli_query($conn, $sql3)) {
			echo "you are Absent";
		} else {
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
	}
	
	// mysqli_close($conn);
}
?>


<?php

?>
<!DOCTYPE html>
<html>

<head>
	<!-- ----------Required meta tags--------- -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User Attendance</title>
	<!-- --------Required Links---------- -->
	<link rel="stylesheet" href="css\font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
	<link rel="stylesheet" href="includes/style.css">
</head>

<body>
	<!-- ---------Navbar---------- -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">AIT Staff Attendance System</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="#">Attendance</a></li>
				<li><a href=" ">Monthly Attendance</a></li>
				<!-- <li><a href="#">People</a></li> -->
				<li><a href="regularize.php">Regularization</a></li>
			</ul>
			<div class="right" style="float:right; color:white;">
				<i class="fa fa-user-circle-o" style="font-size:25px;color:white"></i><?php echo $_SESSION['fname']; ?>
				<button onclick="window.location.href='logout.php'" class="btn btn-primary navbar-btn">Logout</button>
			</div>
		</div>
		</div>
	</nav>
	<!-- ---------------Form Body------------- -->
	<h1 style="text-align:center">MARK ATTENDANCE</h1>
	<div class="container">
		<img src="includes/profile.png" />
		<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
			<!-- ---------Type of User----- -->
			<div class="form-input">
				<label>Type of User:: </label>
				<input type="radio" name="role" <?php if (isset($role) && $role == "pantry") echo "checked"; ?> value="pantry">Pantry
				<input type="radio" name="role" <?php if (isset($role) && $role == "washroom") echo "checked"; ?> value="washroom">Washroom
				<input type="radio" name="role" <?php if (isset($role) && $role == "staff") echo "checked"; ?> value="staff">staff

			</div>

			<!-- ---------------Shift------------- -->
			<div class="form-input">
				<label for="shift">Shift: </label>
				<select name="shift">
					<option value="06:00 To 14:00 | Shift 1" <?php if (isset($shift) && $shift == "06:00 To 14:00 | Shift 1") echo "checked"; ?>>06:00 To 14:00 | Shift 1</option>
					<option value="14:00 To 22:00 | Shift 2">14:00 To 22:00 | Shift 2</option>
					<option value="22:00 To 06:00 | Shift 3">22:00 To 06:00 | Shift 3</option>
				</select>
			</div>
			<!-- ---------------Date and Time------------- -->
			<?php date_default_timezone_set('Asia/Kolkata'); ?>
			<div class="form-input">
				<input type="text" name="date" value=<?php echo "Date:" . date('d-m-Y'); ?>>
			</div>
			<div class="form-input">
				<input type="text" name="time" value=<?php echo date("h:i:s"); ?>>


			</div>

			<input type="submit" name="time_in" value="SignIn" class="btn btn-primary" />
			<input type="submit" name="time_out" value="SignOut" class="btn btn-primary">
			<form>

				<!-- <input onclick="change()" type="button" name="submit" value="Sign In" class="btn-login"/> -->

				<!-- <button type="button" name="time_out" class="btn btn-success btn-lg">Sign Out</button> -->

	</div>
	<!-- <script>
	$(document).ready(function() {
		setInterval(function()
		{
			$('#time').load('userattendance.php')
		}, 1000);
	})
	</script> -->
</body>

</html>