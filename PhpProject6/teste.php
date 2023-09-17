<?php
include('Classes/autoLoad.php');
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
echo "<h2>Listar Produtos</h2>";

    $produtos = new Produto();
   // $retorno = $produtos->exibirProdutos();

    $listaProdutos = $produtos->exibirProdutos();
    
    if (count($listaProdutos) > 0) {
        // Itere sobre os resultados e exiba-os
        foreach ($listaProdutos as $produto) {
            echo "ID: " . $produto['id'] . "<br>";
            echo "Nome: " . $produto['produto'] . "<br>";
            echo "Descrição: " . $produto['descricao'] . "<br>";
            echo "Quantidade: " . $produto['quantidade'] . "<br>";
            echo "Preço: " . $produto['valor'] . "<br><br>";
        }
    } else {
        echo "Nenhum produto encontrado.";
    }




