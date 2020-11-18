<?php
include "connection.php";//Подключаем БД
//делаем запрос на категории
$valuesToreg = $_GET['uLog'];
$uName = $valuesToreg[0];
$Pass = $valuesToreg[1];
$userId = "0";
$query = "select Role, Id_user from User where login = '$uName' and password = '$Pass'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if ($result) {
  while($IDrow = $result->fetch_assoc()) {
    if($IDrow != "") {
      if($IDrow["Role"] == 0) {
        $userId = $IDrow["Id_user"];
        $query1 = "select * from Student where Id_user = '$userId'";
        $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
        while($IDrow1 = $result1->fetch_assoc()) {
          echo "" . $IDrow1["Id_student"] . "--" . $IDrow1["Id_user"]. "--" . $IDrow1["Surname"]. "--" . $IDrow1["Name"]. "--" . $IDrow1["dob"]. "--" . $IDrow1["email"];
        }
        $result1->close();

      } else if($IDrow["Role"] == 1) {

        $userId = $IDrow["Id_user"];
        $query1 = "select * from Teacher where Id_user = '$userId'";
        $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
        while($IDrow1 = $result1->fetch_assoc()) {
          echo "" . $IDrow1["Id_teacher"] . "--" . $IDrow1["Id_user"]. "--" . $IDrow1["Surname"]. "--" . $IDrow1["Name"]. "--" . $IDrow1["Workplace"]. "--" . $IDrow1["email"]. "--" . $IDrow1["experience"];
        }
        $result1->close();
      }
    }
  }
}
$result->close();
?>
