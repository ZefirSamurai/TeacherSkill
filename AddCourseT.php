<?php

$Title = $_POST['Title'];
$Category = $_POST['Category'];
$Description = $_POST['Description'];
$Total = $_POST['Total'];

$mysql = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
$mysql->query("INSERT INTO `Course`(`Title`, `Category`, `Description`)
VALUES('$Title', '$Category', '$Description')");
$sql = "SELECT MAX(id_course) AS MAX FROM `Course`";
$result_select = mysqli_query($mysql, $sql);
$object = mysqli_fetch_object($result_select);
$id_course = $object->MAX;
$mysql->close();

$mysql1 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
$mysql1->query("INSERT INTO `CourseT`(`Id_course`, `TotalScore`)
VALUES('$id_course', '$Total')");
$mysql1->close();
echo '<script language="javascript">';
echo '</script>';
echo '<script>location.replace("../LessonsTAdd.php");</script>'; exit;
?>
