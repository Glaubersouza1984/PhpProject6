<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of conexao
 *
 * @author glaub
 */
abstract class conexao {
    protected function conectarDB(){
        try {
           return $conectar = new PDO("mysql:host=localhost;dbname=dbteste", "root", "");
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
