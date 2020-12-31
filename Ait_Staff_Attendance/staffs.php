<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>staffs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
</head>
<body>
<!-- ------------navbar--------------- -->
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
    <i class="fa fa-users" style="font-size:20px;color:white" aria-hidden="true"></i>
    <button class="btn btn-primary navbar-btn" onClick="document.location.href='registration.php'" >Add Staff</button>
   <button onclick="window.location.href='logout.php'" class="btn btn-primary navbar-btn">Logout</button>
   </div>
  </div>
</nav>
<!-- ------------Table Body--------------- -->
<div class="container">
  <h2 style="color:Tomato;">List Of Registered Staffs</h2>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Emp ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Joining Date</th>
      <th scope="col" colspan="2">Handle</th>
      </tr>
  </thead>
  <tbody>
  <!-- --------Data from users table-------- -->
  <?php
include 'db.php';
$selectquery="select* from users";
$query=mysqli_query( $conn,$selectquery);
while($res=mysqli_fetch_array($query)){
  ?>
<tr>
      <th scope="row"><?php echo $res['emp_id'] ?></th>
      <td><?php echo $res['fname'] ?></td>
      <td><?php echo $res['lname'] ?></td>
      <td><?php echo $res['email'] ?></td>
      <td><?php echo $res['hiredate'] ?></td>
      <td><a href="updatestaff.php?emp_id=<?php echo $res['emp_id']  ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
      <td><a href="deletestaff.php?emp_id=<?php echo $res['emp_id']  ?>"><i class="fa fa-trash" aria-hidden="true" onclick="confirmationBox()"></i></td>
    </tr>
    </tbody>
    <?php
}
?>
</table>
</div>
<script>  
        function confirmationBox(){ 
            confirm("Are you sure you want to delete this user"); 
        } 
    </script>  
</body>
</html>
