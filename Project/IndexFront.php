<html lang="es"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="IndexStyles.css">
     <link rel="stylesheet" href="FormatoCRUDNoticias.css">
    <script src="indexMethods.js"></script>
    <title>RSS_Reader</title>
</head>
<body>
   
           
    <div id="headContainer">
        <div id="headTitle"> <a id="linkTitle" href="Index.html">RSS Reader </a></div>
        <div id="browser">
            <input id="newsBox" type="text" placeholder="News">
            <button id="searchButton"> SEARCH </button>
        </div>
    </div>
    

    <div id="container">
        <div id="ContenedorCRUD">
            <div id="EncabezadoCRUD">
                <form action="./AgregarLink.php" method="POST">
                    <input type="text" id="NombreURL" placeholder="RSS name" name="NombreURL">
                   
                    <input type="text" id="CadenaURL" placeholder="RSS Link" name="CadenaURL"  >
                     <input type="submit"  name="btn_Agregar_CRUD" value="ADD+" class="cyanButton">
                    
                    
                </form>
            </div>
             <div id="ContenidoCRUD">
                 <div id="TituloCrud">
                     Added Links
                 </div>
                <?php
                include './Funciones.php';
                        $links = getLinks();
                        foreach ($links as $product){
                            ?>
                            <div class = "product">
                                <div class = "left">
                                   
                                    <p class = "NombreLink"><?php echo $product['NombreLink']?>  <a style="float:right" href="EliminarLink.php?ID=<?php echo urlencode($product['ID']);?>">Remove</a></p>
                                    <!-- <p class = "Link">  <?php echo $product['Link']?></p> --> 
                                </div>
                            </div>
                            <?php
                        }
                    ?>
            </div>
            
        </div>

        <div id="newsContainer"> 
            <div id="headNewsCont">
                <div id="chooseSort">
                    <p class="sortByText"> Sorting by:</p>
                    <p id="currentSort" class="sortByText">Date</p>
                    <div class="dropdown-sort">
                        <button onclick="SortingBy()" class="dropbtn"></button>
                        <div id="sortings" class="dropdown-sort-content">
                            <button onclick="byDate()" class="sortbtn">Date</button>
                            <button onclick="byTitle()" class="sortbtn">Title</button>
                            <button onclick="byRelevance()" class="sortbtn">Relevance</button>
                        </div>
                    </div>

                </div>
                <button id="updatebtn" class="cyanButton"> UPDATE </button>
            </div>

            <div id="readerContainer">
                Generación Dinámica
            </div>

        </div>

    </div>


</body></html>