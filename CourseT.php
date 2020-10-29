<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

  </head>
  <header>
  </header>
  <body>

      <h1  style="text-align:center; margin-top: 50px" > Add course for teachers</h1>
      <div style="width:98%;margin-left: 30%;" >

    <form class="" action="sc/AddCourseT.php" method="post">

    <label for="appt-time">Course Title: </label>
     <p></p>
        <input type="text" name="Title"  class="form-control"   required>
        <p></p>
    <label class="text-info">Category</label><br>
        <input type="text" name="Category"  class="form-control"   required>
        <p></p>
        <p></p>
          <label class="text-info">Description</label><br>
          <textarea name="Description"  class="form-control"   required></textarea>
          <p>
          <label class="text-info">Total</label><br>
          <input type="number" min="0" max="100" name="Total"  class="form-control"   required>
          <p>
      <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
      </div>
    </form>

  </body>

  <footer>
  </footer>

</html>
