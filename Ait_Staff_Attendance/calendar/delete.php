<?php

//delete.php
include "db.php"
if(isset($_POST["id"]))
{
 
 $query = "
 DELETE from calendarevents WHERE id=:id
 ";
 $statement = $conn->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>