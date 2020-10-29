<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

#myBtnContainer {
    margin-top: 100px;
    margin-left: 400px;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:25%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="ViewCoursesForTeachers.php" onclick="w3_close()" class="w3-bar-item w3-button">Courses for teachers</a>
    <a href="#courses" onclick="w3_close()" class="w3-bar-item w3-button">Courses for students</a>
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

<div id="myBtnContainer">
  <form action="" method="POST">
  <button class="btn " id="all" name = "but" onclick="document.getElementById('all').style.backgroundColor = '#666'"> Show all</button>
  <button class="btn" name = "but1" id="Biology" onclick="document.getElementById('Biology').style.backgroundColor = '#666'"> Biology</button>
  <button class="btn" id ="Math" name = "but2" onclick="document.getElementById('Math').style.backgroundColor = '#666'"> Math</button>
  <button class="btn" id ="Art" name = "but3" onclick="document.getElementById('Art').style.backgroundColor = '#666'">Art & Perfomance</button>
  <button class="btn" id = "Language" name = "but4" onclick="document.getElementById('Language').style.backgroundColor = '#666'">Language</button>
  </form>
</div>
<!-- !PAGE CONTENT! -->
<?php
$categories = 1;
if(isset($_POST['but'])){
    $categories = 1;?>
<script>
document.getElementById('Biology').style.backgroundColor = '#f1f1f1';
document.getElementById('Math').style.backgroundColor = '#f1f1f1';
document.getElementById('Art').style.backgroundColor = '#f1f1f1';
document.getElementById('Language').style.backgroundColor = '#f1f1f1';
document.getElementById('all').style.backgroundColor = '#666';
</script>
<?php
}
if(isset($_POST['but1'])){
    $categories = 'Biology';?>
<script>
document.getElementById('all').style.backgroundColor = '#f1f1f1';
document.getElementById('Math').style.backgroundColor = '#f1f1f1';
document.getElementById('Art').style.backgroundColor = '#f1f1f1';
document.getElementById('Language').style.backgroundColor = '#f1f1f1';
document.getElementById('Biology').style.backgroundColor = '#666';
</script>
<?php
}
if (isset($_POST['but2'])){
    $categories = 'Math';?>
<script>
document.getElementById('Biology').style.backgroundColor = '#f1f1f1';
document.getElementById('all').style.backgroundColor = '#f1f1f1';
document.getElementById('Art').style.backgroundColor = '#f1f1f1';
document.getElementById('Language').style.backgroundColor = '#f1f1f1';
document.getElementById('Math').style.backgroundColor = '#666';
</script>
<?php
}
if (isset($_POST['but3'])){
    $categories = 'Art & Perfomance';?>
<script>
document.getElementById('Biology').style.backgroundColor = '#f1f1f1';
document.getElementById('all').style.backgroundColor = '#f1f1f1';
document.getElementById('Math').style.backgroundColor = '#f1f1f1';
document.getElementById('Language').style.backgroundColor = '#f1f1f1';
document.getElementById('Art').style.backgroundColor = '#666';
</script>
<?php
}
if (isset($_POST['but4'])){
    $categories = 'Language';?>
<script>
document.getElementById('Biology').style.backgroundColor = '#f1f1f1';
document.getElementById('all').style.backgroundColor = '#f1f1f1';
document.getElementById('Math').style.backgroundColor = '#f1f1f1';
document.getElementById('Art').style.backgroundColor = '#f1f1f1';
document.getElementById('Language').style.backgroundColor = '#666';
</script>
<?php
}
?>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class='w3-row-padding w3-padding-16 w3-center' id='courses'>
  <?php
 $mysql0 = new mysqli('localhost','id15179784_user','fw4@las[]5ST_Ptp','id15179784_teacherskill');
 if ($categories == 1){
    $sql0 = "SELECT Title, Category, Course.Id_course as cr FROM Course, CourseS where Course.id_course = CourseS.Id_course";
 }
 else{
     $sql0 = "SELECT Title, Category, Course.Id_course as cr FROM Course, CourseS where Course.id_course = CourseS.Id_course AND Category = '".$categories."'";
 }
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
        echo "<input style='background-color: lime;' type='submit' name='learn more' class='class' value='learn more'>";
        echo "</form></div>";
    }
    $mysql0 ->close();
   ?>

  
    
  </div>
  
  <!-- Second Photo Grid-->
  <!--
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="/images/course_photo.jpg" alt="Popsicle" style="width:100%">
      <h3>All I Need Is a Popsicle</h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    
    <div class="w3-quarter">
      <img src="/images/course_photo.jpg" alt="Salmon" style="width:100%">
      <h3>Salmon For Your Skin</h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="/images/course_photo.jpg" alt="Sandwich" style="width:100%">
      <h3>The Perfect Sandwich, A Real Classic</h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="w3-quarter">
      <img src="/images/course_photo.jpg" alt="Croissant" style="width:100%">
      <h3>Le French</h3>
      <p>Lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
  </div>
-->
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