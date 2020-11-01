<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

  </head>
  <header>
  </header>
  <body>

      <h1  style="text-align:center; margin-top: 50px" > Add lesson into your course</h1>
      <div style="width:98%;margin-left: 30%;" >

    <form class="" action="sc/AddLessonsS.php" method="post">
    <h5>TEST INSERTION FOR ID TEACHER = 1. LATER WILL BE ADDED TEACHER SELECTION AFTER LOG IN</h5>

    
     <p></p>
    <label class = "text-info"> Select your course</label><br> 
    <input list="courses" name="Id_course">

<datalist id="courses">
    <?php
    
    
    $db_hostname = 'localhost';
$db_username = 'id15179784_user';
$db_password = 'fw4@las[]5ST_Ptp';
$db_database = 'id15179784_teacherskill';

// Database Connection String
$con = mysqli_connect($db_hostname,$db_username,$db_password, $db_database);

$sql = "SELECT Id_course, Title FROM Course where Course.id_course IN (SELECT CourseS.Id_courseS FROM CourseS WHERE Id_teacher = 1)  "; 
$r_query = mysqli_query($con, $sql); 

while ($row = mysqli_fetch_array($r_query)){  
    $title = $row['Title'];
    $id = $row['Id_course'];
    echo "<option value=$id>$title</option>";
}  
   ?>
   
</datalist><br><br>
    <label class="text-info">Title</label><br>
        <input type="text" name="Title"  class="form-control"   required>
        <p></p>
         <label class="text-info">Content Text</label><br>
        <textarea name="Content_text"  class="form-control"   required></textarea>
        <p></p>
         <label class="text-info">Content video</label><br>
        <input type="URL" name="Content_video"  class="form-control"   required>
        <p></p>
      <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
      </div>
    </form>

  </body>

  <footer>
  </footer>

</html>
