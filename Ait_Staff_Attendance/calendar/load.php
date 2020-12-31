<?php
include "db.php";
echo "connection success";
$data = array();

$query = "SELECT * FROM calendarevents ORDER BY id";
$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);
