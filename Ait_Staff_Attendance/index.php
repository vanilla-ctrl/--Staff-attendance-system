<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Login</title>
	<!-- Required Links -->
	<link rel="stylesheet" href="css\font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	// ...
	<?php
	include 'db.php';
	echo "connection successful";
	// LOGIN USER
	if (isset($_POST['submit'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			echo "Password matched";
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			echo "$password";
			$results = mysqli_query($conn, $query);
			$rowcount = mysqli_num_rows($results);
			printf("Result set has %d rows.\n", $rowcount);
			if (mysqli_num_rows($results) == 1) {
				while ($row = mysqli_fetch_assoc($results)) {
					$emp_id = $row['emp_id'];
					$fname = $row['fname'];
					$mobile = $row['mobile'];
					$email = $row['email'];
					$role = $row['role'];
					//Starting the session for the user
					$_SESSION['emp_id'] = $emp_id;
					$_SESSION['fname'] = $fname;
					$_SESSION['mobile'] = $mobile;
					$_SESSION['email'] = $email;
					$_SESSION['role'] = $role;
					echo "$role";
					$_SESSION['success'] = "You are now logged in";
					if ($role == 'Admin') {
						header('Location:staffs.php');
					} else {
						header('Location:userattendance.php');
					}
				}
			} else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

	?>
	<!-- ---------Navbar---------- -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">AIT Staff Attendance System</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Attendance</a></li>
				<li><a href="#">Feeds</a></li>
				<li><a href="#">People</a></li>
				<li><a href="#">Quick Links</a></li>
			</ul>
			<div class="right" style="float:right;">
				<button class="btn btn-primary navbar-btn">SIGNUP</button>
			</div>
		</div>
		</div>
	</nav>
	<!-- ------------Login Form-------- -->
	<h1 style="text-align:center">STAFF ATTENDANCE SYSTEM</h1>
	<div class="container">
		<img src="profile.png" />
		<!-- <form action="logincheck.php" method="POST"> -->
		<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">

			<div class="form-input">
				<input type="text" name="email" placeholder="Enter Your Email ID" />
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Enter the Password" />
			</div>
			<?php include('errors.php'); ?>
			<a href="forgotPassword.php">Forgot password?</a><br>
			<input type="submit" name="submit" value="LOGIN" class="btn-login" />

		</form>
	</div>
</body>

</html>