<?php

include ("../init.php");
use Models\Student;



$_id=$_GET['_id'] ?? null;
$ID = new MongoDB\BSON\ObjectId("$_id");
$student= new Student('', '', '', '', '', '','','');
$student->setConnection($connection);
$delete_student = $student->removeStudent($ID);
echo "<script>window.location.href='index.php';</script>";
exit;

?>