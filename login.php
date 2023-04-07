<?php
# http://localhost/projeto/login.php?username=maria@mail.pt&senha=123

require_once("connection.php"); # CONNECT
$table="utilizador";
$username =addslashes($_POST['username']);
$senha=sha1($_POST['senha']);

$sql="SELECT idUtilizador FROM $table 
WHERE username = '$username' AND  senha = '$senha'";

$query=mysqli_query(CONNECT, $sql);
$total = mysqli_num_rows($query);

if($total==1){ # faz login
    session_start();
    $_SESSION['username']=$username;
    $fetch=mysqli_fetch_assoc($query); # disponivel idUtilizador
    $_SESSION['idUtilizador']=$fetch['idUtilizador'];
    $_SESSION['dataInicioSessao']=time(); # 1000    
    $caminho="dashboard.php";

} else { # não faz login
    $caminho="login.html?msg=erroLogin";
}

header("Location:$caminho");


?>