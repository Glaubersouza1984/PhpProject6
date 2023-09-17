<?php
include('conexao.php');
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Produto
 *
 * @author glaub
 */
class Produto extends conexao{
    private $id, $produto, $descricao, $quantidade, $valor;
    private $conn;
    
    function __construct() {
        $this->conn = $this->conectarDB(); // A variávem conn recebe a classe que contém a conexão com o banco de dados sendo assim poderemos acessá-lo pela variável.
    }
    
    private function setDados($dados) {
        $dadosobj = json_decode($dados);
        $this->produto = $dadosobj->produto;
        $this->descricao = $dadosobj->descricao;
        $this->quantidade = $dadosobj->quantidade;
        $this->valor = $dadosobj->valor;
    }
    
    //Método para adicionar produtos através de um array sem bind mas com método prepare e tratamento de erros com try catch
    public function adicinarProduto($dados):bool{
        $this->setDados($dados);
        try {
            $stmt = $this->conn->prepare("INSERT INTO produto (produto, descricao, quantidade, valor) 
                VALUES (:PRODUTO,:DESCRICAO,:QUANTIDADE,:VALOR)");
            $stmt->execute(
                    array(
                        ':PRODUTO'=> $this->produto,
                        ':DESCRICAO'=> $this->descricao,
                        ':QUANTIDADE'=> $this->quantidade,
                        ':VALOR'=> $this->valor
                    )
            );
            $count = $stmt->rowCount();
            return $count ? true: false; // por ser booleano retorna verdadeiro ou falso
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }
    
    // método para alterar produto.
    public function alterarProduto($id, $dados): bool{  
        $this->id = $id;
        $this->setDados($dados);
        
        try {
            $stmt = $this->conn->prepare("UPDATE produto SET"
                    . "produto = :PRODUTO, descricao = :DESCRICAO, quantidade = :QUANTIDADE, valor = :VALOR"
                    . "WHERE id = :ID");
            $stmt->execute(
                    array(
                        ':PRODUTO'=> $this->produto,
                        ':DESCRICAO'=> $this->descricao,
                        ':QUANTIDADE'=> $this->quantidade,
                        ':VALOR'=> $this->valor,
                        ':ID'=> $this->id
                    )
            );
            $count = $stmt->rowCount(); // quantidade de linhas afetadas.
            return $count ? true: false;
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }
    
    // método para excluir produto com statment prepare e bind parametros.
    public function excluirProduto($id):bool {
        $this->id - $id;
        try {
            $stmt = $this->conn->prepare("DELETE FROM produto where id = :ID");
            $stmt->bindParam(':ID', $this->id);
            $stmt->execute();
            $count = $stmt->rowCount();
            return $count ? true: false;
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();    
        }
    }
    
    // método para exibir todos os produtos no retorno um array associativo onde nome das coluns no banco são usados como chaves no arry associativo através da constante PDO::FETCH_ASSOC
    public function exibirProdutos(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM produto ORDER BY produto ASC");
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (Exception $ex) {
            echo 'Error: ' . $ex->getMessage();
        }
    }
    
    public function carregarProduto($id){
        $this->id = $id;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM produto WHERE id = :ID");
            $stmt->bindParam(':ID', $this->id);
            $stmt->execute();
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results[0];
        } catch (Exception $ex) {
            echo 'Error: '. $ex->getMessage();
        }        
    }
}


