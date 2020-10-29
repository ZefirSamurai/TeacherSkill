<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<form class="formSearch" action="" method="post">
  <input type="search" class="inputSearch" name="term" placeholder="Search here...">
  <button type="submit" class="buttonSearch"></button>
</form>


<style>
.formSearch {box-sizing: border-box;}
.formSearch {
  position: relative;
  width: 300px;
  margin: 0 auto;
  margin-right: 15%;
  margin-bottom: 1%;
  height: 42px;
}
.inputSearch {
  height: 42px;
  width: 0;
  padding: 0 42px 0 15px;
  border: none;
  border-bottom: 2px solid transparent;
  outline: none;
  background: transparent;
  transition: .4s cubic-bezier(0, 0.8, 0, 1);
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
}
.inputSearch:focus {
  width: 300px;
  z-index: 1;
  border-bottom: 2px solid #5d9c57;
}
.buttonSearch {
  background: #5d9c57;
  border: none;
  height: 42px;
  width: 42px;
  position: absolute;
  top: 0;
  right: 0;
  cursor: pointer;
}
.buttonSearch:before {
  content: "\f002";
  font-family: FontAwesome;
  font-size: 16px;
  color: white;
}
</style>