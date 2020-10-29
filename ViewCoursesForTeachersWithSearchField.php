<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:25%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="#courses" onclick="w3_close()" class="w3-bar-item w3-button">Courses for teachers</a>
    <a href="ViewCoursesForStudents.php" onclick="w3_close()" class="w3-bar-item w3-button">Courses for students</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">Mail</div>
    <div class="w3-center w3-padding-16">Courses</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
    <?php include 'serchField_FRONTEND.php'; ?>
    <?php
if (!empty($_REQUEST['term'])) {

$db_hostname = 'localhost';
$db_username = 'id15179784_user';
$db_password = 'fw4@las[]5ST_Ptp';
$db_database = 'id15179784_teacherskill';

// Database Connection String
$con = mysqli_connect($db_hostname,$db_username,$db_password, $db_database);

$term = mysqli_real_escape_string($con, $_REQUEST['term']);     

$sql = "SELECT * FROM Course WHERE Title LIKE '%".$term."%' AND Id_course IN (SELECT Id_course FROM CourseT) "; 
$r_query = mysqli_query($con, $sql); 

echo "<h3>Search result: <br /></h3>";
echo "<div class='w3-row-padding w3-padding-16 w3-center' id='courses'>";
while ($row = mysqli_fetch_array($r_query)){  
    $Id_course = $row['Id_course'];
    $title = $row['Title'];
    $category = $row['Category'];
           echo "<div class='w3-quarter'>";
        echo "<form class='' action='CourseTInfo.php' method='post'>";
      echo "<img src='/images/course_photo.jpg' alt='Sandwich' style='width:100%'>";
       echo "<h3>$title</h3>";
       echo "<p>$category</p>";
       echo "<input type='hidden'  name='Id_course' value='$Id_course'> ";
       echo "<input style='background-color: orange;' type='submit' name='learn more' class='class' value='learn more'>";
       echo "</form></div>";
}  
echo "</div>";
}
?>


<h3><br />All courses: <br /></h3>

  <!-- First Photo Grid-->
  <div class='w3-row-padding w3-padding-16 w3-center' id='courses'>
      
      <?php
 $mysql0 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
 $sql0 = "SELECT Title, Category, Course.Id_course as cr FROM Course, CourseT where Course.id_course = CourseT.Id_course";
  $result_select = mysqli_query($mysql0, $sql0);

    while($object = mysqli_fetch_object($result_select)){
        $title = $object->Title;
        $category = $object->Category;
        $Id_course = $object->cr;
           echo "<div class='w3-quarter'>";
        echo "<form class='' action='CourseInfo.php' method='post'>";
      echo "<img src='/images/course_photo.jpg' alt='Sandwich' style='width:100%'>";
       echo "<h3>$title</h3>";
       echo "<p>$category</p>";
       echo "<input type='hidden'  name='Id_course' value='$Id_course'> ";
       echo "<input style='background-color: orange;' type='submit' name='learn more' class='class' value='learn more'>";
       echo "</form></div>";
    }
    $mysql0 ->close();
   ?>

  
    
  </div>
  
  
  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  
  <hr id="about">

 
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
    

    <div class="w3-third w3-serif">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>