<?php
session_start();
require_once "db.php";
echo "connection success";
if(isset($_POST['submit'])){
    <?php echo $_SESSION['emp_id']; ?>
    <?php echo $_SESSION['fname']; ?>
    $emp_id = $_SESSION['emp_id'];
    $fname = $_SESSION['fname'];
    $shift = mysqli_real_escape_string($conn, $_POST['shift']);
    $date = date('Y-m-d H:i:s');
    // $sql= "INSERT INTO attendance_timesheet (emp_id, fname, shift, date, time_in, time_out) VALUES ('$emp_id', '$fname', '$shift', '$date', '$now()','')";
    $sql="INSERT INTO `attendance_timesheet`(`emp_id`, `fname`, `shift`, `date`, `time_in`, `time_out`) VALUES ([$emp_id],[$fname],[$shift],[now()],[now()],[now()])";
    $query= mysqli_query($conn, $sql);
    if ($query){
        ?>
        <script>
        alert('Login Successful');
        </script>
        <?php
        }else{?>
            <script>
        alert('Error');
        </script>
        }
        <?php
        }
    
        ?>
        <?php
            // $_SESSION['email']= $emp;
            header('location:staffs.php');
        
        // else{
        //     echo "login failed..!!";
        //     header('location:index.php');
        // }
    }


?>