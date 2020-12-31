<!-- -------------Starting session----------- -->
<?php
session_start();
include 'db.php'; ?>
<!-- -------------Time In----------- -->
<?php
echo session_id();
echo $_SESSION['fname'];
echo "connection success";
if (isset($_POST['time_in'])) {
	echo "hi";
	$emp_id = $_SESSION['emp_id'];
	$fname = $_SESSION['fname'];
	$shift = mysqli_real_escape_string($conn, $_POST['shift']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	$sql = "insert into attendance_timesheet (emp_id,fname,shift, date, time_in, time_out) values ('$emp_id','$fname','$shift', CURDATE(), CURTIME(), CURTIME())";
	if (mysqli_query($conn, $sql)) {
		echo "Sign In successfully !";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>
<!-- -------------Sign Out Button----------- -->
<?php
echo session_id();
echo $_SESSION['fname'];
echo "connection success";
if (isset($_POST['time_out'])) {
	$emp_id = $_SESSION['emp_id'];
	$fname = $_SESSION['fname'];
	$shift = mysqli_real_escape_string($conn, $_POST['shift']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$time = mysqli_real_escape_string($conn, $_POST['time']);
	echo $sql = "UPDATE attendance_timesheet SET time_out = 'CURTIME()' WHERE emp_id = $emp_id";

	if (mysqli_query($conn, $sql)) {
		echo "Sign Out successfully !";
	} else {
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
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
	<link rel="stylesheet" href="style.css">
	<style>
		#time {
			width: 50%;
			margin: auto;
			font-family: clock;
			font-size: 20px;

		}
	</style>

</head>

<body>
	<!-- ---------Navbar---------- -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">AIT Staff Attendance System</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li class="active"><a href="#">Attendance</a></li>
				<li><a href="#">Feeds</a></li>
				<li><a href="#">People</a></li>
				<li><a href="#">Quick Links</a></li>
			</ul>
			<div class="right" style="float:right;">
				<i class="fa fa-user-circle-o" style="font-size:25px;color:white"></i><?php echo $_SESSION['fname']; ?>
				<button onclick="window.location.href='logout.php'" class="btn btn-primary navbar-btn">Logout</button>
			</div>
		</div>
		</div>
	</nav>
	<!-- ---------------Form Body------------- -->
	<h1 style="text-align:center">STAFF ATTENDANCE SYSTEM</h1>
	<p>Your Employee ID is<?php echo $_SESSION['emp_id']; ?></p>
	<div class="container">
		<img src="profile.png" />
		<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
			<?php date_default_timezone_set('Asia/Kolkata'); ?>
			<!-- ---------------Shift------------- -->
			<div class="form-input"><br>
				<label for="shift">Shift: </label>
				<select name="shift">
					<option value="shift 1" <?php if (isset($shift) && $shift == "Shift 1") echo "checked"; ?>>Shift 1</option>
					<option value="shift 2">Shift 2</option>
					<option value="shift 3">Shift 3</option>
				</select></div>
			<!-- ---------------Date and Time------------- -->
			<div class="form-input">
				<input type="text" name="date" value=<?php echo "Date:" . date('d-m-Y'); ?>>
			</div>
			<div class="form-input">
				<input type="text" name="time" value=<?php echo "Time:" . date("h:i:s A"); ?>>
			</div>

			<input type="submit" name="time_in" value="SignIn" class="btn-login" />
			<input type="submit" name="time_out" value="SignOut" class="btn-login" />
			<form>

				<!-- <input onclick="change()" type="button" name="submit" value="Sign In" class="btn-login"/> -->

				<!-- <button type="button" name="time_out" class="btn btn-success btn-lg">Sign Out</button> -->

	</div>

</body>

</html>