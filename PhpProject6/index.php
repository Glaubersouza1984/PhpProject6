<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html lang = "pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Sistema de Vendas</title>
    </head>
    <body>
        <div class="container">
           <?php
             $acao="";
           ?>
        </div>
        
        <div class="col col-lg-10">
            <?php
              include ('formulario.php');  
            ?>
        </div>
        
        <div class="row">
            <div class="col col-lg-10">
                <?php
                    include('listarProduto.php');
                ?>
            </div>
        </div>
    </body>
</html>
