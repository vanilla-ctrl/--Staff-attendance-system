<?php
//session_start();
require_once "db.php";
if(isset($_POST['submit'])){
    $emp= $_POST['emp_id'];
    $password= $_POST['pass'];
    $sql= "select * from users where emp_id=' $emp' and role='admin' and pass= '$password'";
    $query= mysqli_query($conn, $sql);
    
            echo "login succesful";
            $_SESSION['emp_id']= $emp;
            header('location:registration.php');
        
        /*else{
            echo "login failed..!!";
            header('location:profile.php');
        }*/
    }


?>