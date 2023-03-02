function loadNews() {
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        document.getElementById("readerContainer").innerHTML = this.responseText;
    };
    
    const orderType = document.getElementById("currentSort").textContent.toLowerCase();
    
    xhttp.open(
        "POST",
        "http://localhost/proyecto_optimizacion_web/Project/php/by_name.php",
        true
    );
    
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`type=${orderType}`);
}

function SortingBy() {
    document.getElementById("sortings").classList.toggle("show");
  }
  

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-sort-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
            }
        }
    }
}

function byDate() {
    document.getElementById("currentSort").innerHTML = "Date";
}

function byTitle() {
    document.getElementById("currentSort").innerHTML = "Title";
}

function byDescription() {
    document.getElementById("currentSort").innerHTML = "Description";
}
function byCategory() {
    document.getElementById("currentSort").innerHTML = "Category";
}