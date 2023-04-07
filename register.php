<?php
/* CREATE TABLE IF NOT EXISTS utilizador(
    idUtilizador INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL
); */
# http://localhost/projeto/register.php?username=tone&senha=Caramelos321
require_once("connection.php"); # testar CONST CONNECT

$username=addslashes($_POST['username']); # voltar aqui
$senha=sha1($_POST['senha']);

# teste ao username
$sql="SELECT idUtilizador FROM utilizador WHERE username = '$username'";
$query=mysqli_query(CONNECT ,$sql);
$total=mysqli_num_rows($query);

if($total==0) {
    # registo
    $sql="INSERT INTO utilizador VALUES (NULL , '$username' , '$senha')";
    mysqli_query(CONNECT ,$sql);
       
    $path="login.html?msg=usernameRegistado";
} else {
    # não registo
    $path="register.html?msg=usernameRepetido";
}
mysqli_free_result($query);
mysqli_close(CONNECT);
header("Location:$path");
?>