window.onload = function(){loadNews();};


const card_news = document.getElementById('sample');
const templateCard = document.getElementById('template-card').content;
const fragment_news = document.createDocumentFragment();


function loadNews() {
    document.getElementById("sample").innerHTML = "";

    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            deployCards(data);
        }
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

function searchWord() {

    document.getElementById("sample").innerHTML = ""

    const word = document.getElementById("newsBox").value;
    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            deploySearch (data,word);
        }
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
    loadNews();
}

function byTitle() {
    document.getElementById("currentSort").innerHTML = "Title";
    loadNews();
}

function byDescription() {
    document.getElementById("currentSort").innerHTML = "Description";
    loadNews();
}
function byCategory() {
    document.getElementById("currentSort").innerHTML = "Category";
    loadNews();
}



const deploySearch = function (datos, word){


    for(let item of datos){

   

        if (item[1].indexOf(word) !== -1) {
            templateCard.getElementById('s-title').innerHTML= item[1];
            templateCard.getElementById('s-cat').innerHTML= item[6]; 
            templateCard.getElementById('s-desc').innerHTML= item [2];
            templateCard.querySelector('img').setAttribute('src', item[7]);
            templateCard.getElementById('s-url').innerHTML= "URL:  " + item [4];
            templateCard.getElementById('s-date').innerHTML = item[3];
    
            const clone = templateCard.cloneNode(true);
            fragment_news.appendChild(clone);

            console.log(item[1]);
           
        }else if (item[2].indexOf(word) !== -1){
            templateCard.getElementById('s-title').innerHTML= item[1];
            templateCard.getElementById('s-cat').innerHTML= item[6]; 
            templateCard.getElementById('s-desc').innerHTML= item [2];
            templateCard.querySelector('img').setAttribute('src', item[7]);
            templateCard.getElementById('s-url').innerHTML= "URL:  " + item [4];
            templateCard.getElementById('s-date').innerHTML = item[3];
    
            const clone = templateCard.cloneNode(true);
            fragment_news.appendChild(clone);

            console.log(item[2]);

        } else if (item[6].indexOf(word) !== -1){
            templateCard.getElementById('s-title').innerHTML= item[1];
            templateCard.getElementById('s-cat').innerHTML= item[6]; 
            templateCard.getElementById('s-desc').innerHTML= item [2];
            templateCard.querySelector('img').setAttribute('src', item[7]);
            templateCard.getElementById('s-url').innerHTML= "URL:  " + item [4];
            templateCard.getElementById('s-date').innerHTML = item[3];
    
            const clone = templateCard.cloneNode(true);
            fragment_news.appendChild(clone);

            console.log(item[6]);
        }


        
      
    
    
    } card_news.appendChild(fragment_news);
  

}

const deployCards = function(datos){

    
    for(let item of datos){
        
        templateCard.getElementById('s-title').innerHTML= item[1];
        templateCard.getElementById('s-cat').innerHTML= item[6]; 
        templateCard.getElementById('s-desc').innerHTML= item [2];
        templateCard.querySelector('img').setAttribute('src', item[7]);
        templateCard.getElementById('s-url').innerHTML= "URL:  " + item [4];
        //templateCard.getElementById('a-url').setAttribute('href', item[4])
       
        templateCard.getElementById('s-date').innerHTML = item[3];


        const clone = templateCard.cloneNode(true);
        fragment_news.appendChild(clone);
        
    }
    
    card_news.appendChild(fragment_news);

};