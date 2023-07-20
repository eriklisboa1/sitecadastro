
<?php

require_once 'Inserir.php';

//Capturando os dados do form
/*
  nome 
idade 
email 
celular 
cpf 
senha
*/
if(isset($_POST['nome'])){
  $nome = $_POST['nome'];
}

if(isset($_POST['idade'])){
  $idade = $_POST['idade'];
}

if(isset($_POST['email'])){
  $email = $_POST['email'];
}
if(isset($_POST['celular'])){
  $celular = $_POST['celular'];
}

if(isset($_POST['cpf'])){
  $cpf = $_POST['cpf'];
}

if(isset($_POST['senha'])){
  $senha = $_POST['senha'];
}

$insere = new Inserir();

if($nome && $idade && $email && $celular && $cpf && $senha){
  $resultado = $insere->inserirUsuario($nome,$idade,$email,$celular,$cpf,$senha);
}