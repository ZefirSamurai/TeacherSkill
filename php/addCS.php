<?php
  include "connection.php";
  $values = $_GET['courseInfo'];
  $Title = $values[0];
  $Descr = $values[1];
  $Category = $values[2];
  $TimeReq = $values[3];
  $Id_user = 1;

$query = "Insert into Course (Title, Description, Category) values ('$Title','$Descr','$Category')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if ($result) {
  $takeId = "select Id_course from Course where Id_course in (select max(Id_course) from Course) and Title = '$Title'";
      $IdResult = mysqli_query($link, $takeId) or die(mysqli_error($link));
       while($object = mysqli_fetch_object($IdResult)){
         $Id_course = $object -> Id_course;
    }
} else {
  echo "0";
}

    $query1 = "Insert into CourseS (Id_course, Id_teacher, Time_Completion) values ('$Id_course','$Id_user','$TimeReq')";
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    if ($result1) {
      echo "1";
    } else {
      echo "0";
    }
?>
