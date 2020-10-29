<?php
//this is id to LTP choosen row
$Id_course = $_POST['Id_course'];

include "connection.php";
  
$query = "select Title, Description,  Category  from Course where  Course.Id_course = $Id_course ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
if ($result) {
       while($object = mysqli_fetch_object($result)){
         $Title = $object -> Title;
         $Description = $object -> Description;
           $Category = $object -> Category;
           
    }
} else {
  
}
// count amound of students in course 
$query2 = "select Count(Id_uic) as s From UIC where Id_course = $Id_course";
            $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
            while( $object2 = mysqli_fetch_object($result2)){
            $NofStudents = $object2 -> s;
            }
$query3 = "select Count(Id_courseS) as c From CourseS where Id_teacher = (select Id_teacher from CourseS where Id_course = $Id_course)";
            $result3 = mysqli_query($link, $query3) or die(mysqli_error($link));
            while( $object3 = mysqli_fetch_object($result3)){
            $NofCourses = $object3 -> c;
            }
?>
<!DOCTYPE html>
<html>
<title>Course Info</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding" style="padding-left : 8.3%">
  

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i><?php echo $Title; ?>    <span class="w3-tag w3-teal w3-round"><?php echo $Category ; ?></span></h2>
        
        <div class="w3-container">
            <h5 class="w3-opacity">About Course</h5>
         
          <p><?php echo $Description; ?></p>
          <hr>
          <h5 class="w3-opacity"><b><?php echo $NofStudents; ?> - Number of students already in this course. </b></h5>
            <p align="right"><a href="something" class="button6"  >Join</a></p>
          
        </div>
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Lessons</h2>
        <?php
 $mysql0 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
 $sql0 = "SELECT Id_LessonContent,  Title , ContentText, ContentVideo FROM LessonContent where Id_course = $Id_course";
 $num = 1;
  $result_select = mysqli_query($mysql0, $sql0);
    while($object = mysqli_fetch_object($result_select)){
        $TitleL = $object->Title;
        $Id_LessonContent = $object-> Id_LessonContent;
        
           echo "<div class='w3-container'>";
        echo "<form class='' action='LessonView.php' method='post'>";
       echo "<input type='hidden'  name='Id_LessonContent' value='$Id_LessonContent'> ";
       echo "<table width='100%'><tr><td width='10%'><div><h5> $num </h5></div></td> <td td width='75%'><div><h5><u>$TitleL</u></h5></div></td><td td width='15%'><div >  <input style='background-color: silver; border-radius:8px;font-family:Arial;font-size:14px; padding:6px 20px;' type='submit' name='view' class='class' value='view'> </div></td></tr></table></p>";
      
       //echo "<input style='background-color: grey; align: right;' type='submit' name='view' class='class' value='view'>";
       echo "</form></div>";
       $num += 1;
    }
    $mysql0 ->close();
   ?>
   <hr>
      </div>

    <!-- End Right Column -->
    </div>
    
   <!-- Left Column -->
    <div class="w3-quarter" >
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src='/images/course_photo.jpg' style="width:100%" alt="Avatar">
          
        </div>
        <div class="w3-container">
            <h2>Courses for Teachers</h2>
          
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Some info about OUR courses</p>
          
          <hr>

          

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i> stats</b></p>
          <p>Stat 1</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
          </div>
          <p>Stat 2</p>
          <div class="w3-light-grey w3-round-xlarge">
            <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
          </div>
          
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>



</body>
<style>
a.button6{
display:inline-block;
padding:0.7em 1.4em;
margin:0 0.3em 0.3em 0;
border-radius:0.15em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
text-transform:uppercase;
font-weight:400;
color:#FFFFFF;
background-color:#3369ff;
box-shadow:inset 0 -0.6em 0 -0.35em rgba(0,0,0,0.17);
text-align:center;
position:relative;
}
a.button6:active{
top:0.1em;
}
@media all and (max-width:30em){
a.button6{
display:block;
margin:0.4em auto;
}
}

tr:hover {background-color:#f5f5f5;}
    </style>

</html>
