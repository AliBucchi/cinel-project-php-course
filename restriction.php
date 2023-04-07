<?php

session_start();

if(isset($_SESSION['username'])){ # testar a variável
    $username=$_SESSION['username'];
    $idUtilizador=$_SESSION['idUtilizador'];

    $tempoSessao=3600; # em segundos
    $duracaoSessao=$_SESSION['dataInicioSessao']+$tempoSessao;
    
    if($duracaoSessao < time() ){
    header("Location:logout.php?msg2"); 
}
} else {
    header("Location:login.html?msg=semLogin");
}

$_SESSION['dataInicioSessao']=time();
?>