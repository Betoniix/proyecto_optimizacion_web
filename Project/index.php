<html lang="es"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="IndexStyles.css">
    <title>RSS_Reader</title>
</head>
<body>
  
    <div id="headContainer">
        <div id="headTitle"> <a id="linkTitle" href="Index.php">RSS Reader </a></div>
        <div id="browser">
            <input id="newsBox" type="text" placeholder="News">
            <button id="searchButton"> SEARCH </button>
        </div>
    </div>

    

    <div id="container">

        <div id="ContenedorCRUD">
            <div id="EncabezadoCRUD">
                <form action="php/SaveNews.php" method="POST">
                    <input type="text" id="NombreURL"  class="linkBox" placeholder="RSS name" autocomplete="off" name="NombreURL">        
                    <input type="text" id="CadenaURL" class="linkBox" placeholder="RSS Link" autocomplete="off" name="CadenaURL">
                    <input type="submit"  id="addButton" class="cyanButton" name="btn_Agregar_CRUD" value="ADD+" class="cyanButton">
                </form>
            </div>
             <div id="ContenidoCRUD">
                 <div id="TituloCrud">
                    <p class="adli"> Added Links </p>
                 </div>
                 <?php
                include './Funciones.php';
                        $links = getLinks();
                        foreach ($links as $product){
                            ?>
                            <div class = "product">
                                <div class = "left">
                                   
                                    <p class= "linkNameText">  <?php echo $product['NombreLink']?> </p>  <a class="removeText" href="EliminarLink.php?ID=<?php echo urlencode($product['ID']);?>">Remove</a>
                                    <!-- <p class = "Link">  <?php echo $product['Link']?></p> --> 
                                </div>
                            </div>
                            <?php
                        }
                    ?>
            </div>
            
        </div>


        <!--
        <div id="linkContainer">
            <div id="headLinkCont">
                <input id="linkNameBox" class="linkBox" type="text" placeholder="RSS Name"> <br>
                <input id="linkDirBox" class="linkBox" type="text" placeholder="RSS Link">
                <button id="addButton" class="cyanButton"> ADD + </button>
            </div>
            <p class="adli"> Added links </p>

        </div>
                    -->
        <div id="newsContainer"> 
            <div id="headNewsCont">
                <div id="chooseSort">
                    <p class="sortByText"> SORTING BY:</p>
                    <p id="currentSort" class="sortByText">Date</p>
                    <div class="dropdown-sort">
                        <button onclick="SortingBy()" class="dropbtn"><i class="fa fa-chevron-down"></i></button>
                        <div id="sortings" class="dropdown-sort-content">
                            <button onclick="byDate()" class="sortbtn">Date</button>
                            <button onclick="byTitle()" class="sortbtn">Title</button>
                            <button onclick="byDescription()" class="sortbtn">Description</button>
                            <button onclick="byCategory()" class="sortbtn">Category</button>
                        </div>
                    </div>

                </div>
                <button onclick="loadNews()" id="updatebtn" class="cyanButton"> UPDATE </button>
            </div>

            <div id="readerContainer">
                Generación Dinámica
            </div>

        </div>

    </div>

    <script src="indexMethods.js?V=1.0.2"></script>
</body>
</html>