<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <link rel="stylesheet" type="text/css" href="FormatoCRUDNoticias.css"/>
    </head>
    <body>
        <div id="ContenedorCRUD">
            <div id="EncabezadoCRUD">
                <form action="./AgregarLink.php" method="POST">
                    <input type="text" id="NombreURL" placeholder="RSS name" name="NombreURL">
                    <input type="submit" name="btn_Agregar_CRUD" value="ADD+">
                    <input type="text" id="CadenaURL" placeholder="RSS Link" name="CadenaURL" >
                    
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
    </body>
</html>
