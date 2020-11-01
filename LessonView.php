<?php
//this is id to LTP choosen row
$Id_LessonContent = $_POST['Id_LessonContent'];
include "connection.php";

$mysql0 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
 $sql0 = "SELECT Id_LessonContent,  Title , ContentText, ContentVideo FROM LessonContent where Id_LessonContent = $Id_LessonContent";
 $num = 1;
  $result_select = mysqli_query($mysql0, $sql0);
    while($object = mysqli_fetch_object($result_select)){
        $TitleL = $object->Title;
        $ContentVideo = $object -> ContentVideo;
        $ContentText = $object -> ContentText;
    }
    $mysql0 ->close();
?>
<body '>
<div>
    <div style='border-radius:20px; background:linear-gradient(to bottom, #ffffff 5%, #b8c7d1 100%); font-family:Arial; padding: 10px 5%; margin: 1% 10%;' >
        <h2><?php echo $TitleL; ?></h2>
        
    </div>
    <div style='border-radius:20px; background: #b8c7d1 ; font-family:Arial; padding: 0% 5%; margin: 0% 10%;' align='center' padding='10px'>
        <br>
        
        <h5><?php echo $ContentText; ?></h5>
        <br>
        <?php 
        if ($ContentVideo != ''){
         echo "<iframe width='560' height='315'   src='$ContentVideo' frameborder='0 allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> </iframe> ";
        }
        
         ?>
         
        
        <p></p>
    </div>
  </div>
</body>