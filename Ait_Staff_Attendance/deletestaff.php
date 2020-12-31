
<?php
include 'db.php';
$emp_id=$_GET['emp_id'];
$deletequery= "delete from users where emp_id=$emp_id";
    $query= mysqli_query($conn, $deletequery);
    if ($query){
        ?>
        <script>
        alert('Deleted Successfully');
        </script>
        <?php
        header("location: staffs.php");
        }else{?>
            <script>
        alert('Error');
        </script>
        <?php
        }
    ?>