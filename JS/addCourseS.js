var Title = "";
var Description = "";
var Category = "";
var reqTime = "";
var addForm = document.getElementById("msform");

var xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    if(parseInt(this.responseText) != 0) {
        document.location.href = "https://teacherskill.000webhostapp.com/ViewCoursesForStudentsWithSearchField.php";
    }
};

document.getElementById("Title").addEventListener('change', evt => {
    Title = document.getElementById("Title").value;
});
document.getElementById("Description").addEventListener('change', evt => {
    Description = document.getElementById("Description").value;
});
document.getElementById("Category").addEventListener('change', evt => {
    var e = document.getElementById("Category");
    Category = e.options[e.selectedIndex].text;
});
document.getElementById("Time_Completion").addEventListener('change', evt => {
    reqTime = document.getElementById("Time_Completion").value;
});

addForm.addEventListener('submit', evt => {
    xhttp.open("GET", "https://teacherskill.000webhostapp.com/addCS.php?courseInfo[]="+ Title + "&courseInfo[]=" + Description + "&courseInfo[]=" + Category + "&courseInfo[]=" + reqTime);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
});