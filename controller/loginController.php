<?php
require_once('../conexao/conexao.php');
session_start();

$email = $_POST['Email'];
$senha = $_POST['pass'];



$sql   = "select * from administrador where email='$email' and senha='$senha'";

$qry = mysqli_query($Con, $sql);
$linha = mysqli_fetch_array($qry);
if ($linha) {
 
  $nome = $linha['nome'];
  $id = $linha['id_administrador'];
  $_SESSION['email'] = $email;
  
   $_SESSION['nome'] = $nome;
  $_SESSION['id_administrador'] = $id;
  if (mysqli_affected_rows($Con) > 0) {
    echo "Seja bem vindo," . $linha['nome'];
  } 
  
    header("Location:../view/adm/");
}else {
  $_SESSION['msg'] = "E-mail ou senha não conferem!";
  header("Location:../view/login/");
}



