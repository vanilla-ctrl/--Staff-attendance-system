<!DOCTYPE html>
<html lang="en">

<head>

  <title>Update Staffs</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<!-- ----------------------Navbar-------------- -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">AIT Staff Attendance System</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Attendance</a></li>
        <li><a href="#">Feeds</a></li>
        <li><a href="display.php">Staffs</a></li>
        <li><a href="#">Quick Links</a></li>
      </ul>
      <div class="right" style="float:right;">
        <button class="btn btn-primary navbar-btn">Logout</button>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="form-row">
      <div class="col-lg-6 col-offset-2">
        <div class="page-header">
          <!-- <h3 style="color:Tomato;">Register New Employee Here.....</h3> -->
        </div>


        <form action=" " method="post">

          <?php
          require_once "db.php";
          $emp_id = $_GET['emp_id'];
          $selectquery = "select * from users where emp_id=$emp_id";
          $query = mysqli_query($conn, $selectquery);
          $res = mysqli_fetch_assoc($query);
          ?>
          <?php
// Update Query
          if (isset($_POST['signup'])) {
            // $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
            $hiredate = mysqli_real_escape_string($conn, $_POST['hiredate']);
            $role = mysqli_real_escape_string($conn, $_POST['role']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

            $updatequery = "UPDATE users set emp_id='$emp_id', fname='$fname', lname='$lname', email='$email', 
mobile='$mobile', bdate='$bdate', hiredate='$hiredate', role='$role', password='" . md5($password) . "' where emp_id='$emp_id'";
            $query = mysqli_query($conn, $updatequery);
            if ($query) {
          ?>
              <script>
                alert('Updated Successfully');
              </script>
            <?php
            } else { ?>
              <script>
                alert('Error');
              </script>
              }
          <?php
            }
          }
          ?>
<!-- ---------Update Form--------------->
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $res['fname'] ?>" maxlength="50" required="">

          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $res['lname'] ?>" maxlength="50" required="">

          </div>
          <div class="form-group ">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $res['email'] ?>" maxlength="30" required="">

          </div>
          <div class="form-group">
            <label>Mobile</label>
            <input type="number" name="mobile" class="form-control" value="<?php echo $res['mobile'] ?>" minlength="10" maxlength="12" required="">

          </div>
          <div class="form-group">
            <label>BirthDate</label>
            <input type="date" name="bdate" class="form-control" value="<?php echo $res['bdate'] ?>" maxlength="12" required="">

          </div>
      </div>
    </div><br><br><br><br>
    <div class="form-row">
      <div class="col-lg-6 col-offset-2">

        <div class="form-group">
          <label>Joining Date</label>
          <input type="date" name="hiredate" class="form-control" value="<?php echo $res['hiredate'] ?>" maxlength="12" required="">

        </div><br>
        <div class="form-group">
          <label for="role">Type of User:</label>
          <select name="role">
            <option value="Admin" <?php if (isset($role) && $role == "admin") echo "checked"; ?>>Admin</option>
            <option value="Intern">Staff</option>
            <option value="Pantry">Pantry</option>
            <option value="Washroom">Washroom</option>
          </select>
        </div><br>


        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" value="" maxlength="10" required="">

        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="cpassword" class="form-control" value="" maxlength="10" required="">

        </div>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="signup" value="UPDATE">
        </form>
      </div>
    </div>
  </div>
</body>

</html>