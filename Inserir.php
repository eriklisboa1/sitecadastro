<?php

require_once 'conexao.php';

class Inserir{
    /*
    nome 
idade 
email 
celular 
cpf 
senha
    */

    function inserirUsuario($nome,$idade,$email,$celular,$cpf,$senha){
        try{
            $pdo  = new pdo('mysql:host=' . HOST_BD . ';dbname=' . BD_BD, USR_BD, PW_BD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
        }catch (PDOExeception $erro){
            echo "Erro na conexão:" . $erro->getMessage();
        }
        try{
            $stmt = $pdo->prepare("INSERT INTO usuariosnew(nome,idade,email,celular,cpf,senha) VALUES
            (:nome, :idade, :email, :celular, :cpf, :senha)");

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':idade', $idade);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':celular',$celular);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':senha',$senha);
            

            $stmt->execute();
            if($stmt->rowCount() > 0){
                $resultadoInsert="OK";
                header("location: tabletest.php"); exit;
            }
        }catch(PDOExeception $erro){
            echo "Erro" . $erro->getMessage();
        }
    }

}


?>