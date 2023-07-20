<?php
require_once 'php/conexao.php';

class Selecao{

    function selecionarUsuario(){
        try{
            $pdo  = new pdo('mysql:host=' . HOST_BD . ';dbname=' . BD_BD, USR_BD, PW_BD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
        }catch (PDOExeception $erro){
            echo "Erro na conexão:" . $erro->getMessage();
        }

        try{
            $stmt = $pdo->prepare("SELECT  id,nome,idade,email,celular,cpf,senha FROM usuariosnew");
            if($stmt-> execute()){
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }else{
                throw new PDOExecption("Erro: Não foi possivel executar a declaração sql da função selecionarUsuario");
            }
    }catch (PDOExecption $erro){
        echo"Erro: ". $erro->getMessage();
    }
}
}