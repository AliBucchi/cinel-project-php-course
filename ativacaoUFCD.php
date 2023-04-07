<?php
# exercício
# ativacaoUFCD.php?idUFCD=&estado=

require_once("restriction.php");
require_once("connection.php"); # CONNECT

$estado=$_GET['estado']; # é preciso "inverter" o valor do estado 0 para 1 ou 1 para 0
if($estado==1){
    $estado=0;
} else {
    $estado=1;
}


$idUFCD=$_GET['idUFCD'];
$table="ufcd";

$sql ="UPDATE $table SET estado = $estado WHERE idUFCD = $idUFCD";

mysqli_query(CONNECT, $sql);

header("Location:ufcd.php?estadoAlterado");
?>