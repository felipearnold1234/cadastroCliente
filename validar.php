<?php 
include "config.php";
extract($_REQUEST);
session_start();
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
  if (isset($entrar)) {
           
   $verifica = mysqli_query($con, "SELECT * FROM usuariosEmpresa WHERE login = 
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
         unset ($_SESSION['login']);
         unset ($_SESSION['senha']);
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }else{
        setcookie("login",$login);
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header("Location:menu.php");
      }
  }
?>