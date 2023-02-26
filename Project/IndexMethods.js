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

function byRelevance() {
    document.getElementById("currentSort").innerHTML = "Relevance";
}