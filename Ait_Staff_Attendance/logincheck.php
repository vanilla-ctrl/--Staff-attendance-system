<?php
// session_start();
require_once "db.php";
if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $sql= "select * from users where email=' $email' and role='admin' and password= '$password'";
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