
<?php

$Title = $_POST['Title'];
$Content_text = $_POST['Content_text'];
$Content_video = $_POST['Content_video'];
$Id_course =  $_POST['Id_course'];


$mysql1 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
$mysql1->query("INSERT INTO `LessonContent`(`Id_course`, `Title`,`ContentText`,`ContentVideo`)
VALUES('$Id_course', '$Title', '$Content_text', '$Content_video')");
$mysql1->close();
?>
<html>
    <body>
        <p>Add another one lesson</p>
        <a href="../LessonsTAdd.php">YES</a>
        <a href="../index.php">NO</a>
    </body>
    </html>
