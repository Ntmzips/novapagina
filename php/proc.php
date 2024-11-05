
<?php

require_once "../php/banco.php";

$banco = new Banco ("localhost", "pontual","root","");



$usuario = $_POST['usuario'];

$senha = $_POST['senha'];

if(empty(($senha))){
    echo "Preencha Corretamente os Campos";
    header("Location: ../../index.html");
}


$banco -> query ("SELECT nome, senha FROM usuario  WHERE nome =  '".$usuario."'");

$resultado = $banco->result();


?>