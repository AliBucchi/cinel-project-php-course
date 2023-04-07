<?php
# http://localhost/projeto/registarUFCD.php?codigo=0526&designacao=PHP
require_once("restriction.php");
require_once("connection.php");

$codigo=addslashes($_GET['codigo']);
$designacao=addslashes($_GET['designacao']);
$table="ufcd";
$sql="SELECT idUFCD FROM $table WHERE codigo = '$codigo'";
$query=mysqli_query(CONNECT,$sql);
$total=mysqli_num_rows($query);
if($total==0){
    # regista
    $sql="INSERT INTO $table VALUES (NULL, '$codigo', '$designacao', 1)";
    mysqli_query(CONNECT, $sql);
    $path="sucesso";
} else {
    #não regista
    $path="fracasso&designacao=$designacao";
}
header("Location:ufcd.php?$path");
?>