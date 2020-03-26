<?php
require_once('../conexao/conexao.php');

$email = $_POST['Email'];
$senha = $_POST['pass'];



$sql   = "select * from administrador where email='$email' and senha='$senha'";

$qry = mysqli_query($con, $sql);
$linha = mysqli_fetch_array($qry);
session_start();
$nome = $linha['nome'];
$id = $linha['id'];
$_SESSION['email'] = $email;

 $_SESSION['nome'] = $nome;
$_SESSION['id'] = $id;
if (mysqli_affected_rows($con) > 0) {
  echo "Seja bem vindo," . $linha['nome'];
} else {
  echo "Nome ou Senha Inválidos";
}
$tipo = $linha['tipo'];
if ($tipo == 'adm') {
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  $_SESSION['nome'] = $nome;
  header("Location:adm.php");
}
if ($tipo == 'usu') {
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  $_SESSION['nome'] = $nome;
  header("Location:usu.php");
}
