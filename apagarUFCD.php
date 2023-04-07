<?php

# só necessito da tabela e do id
require_once("restriction.php");
require_once("connection.php");

$idUFCD=$_GET['idUFCD'];
$table= "ufcd";

$sql="DELETE FROM $table WHERE idUFCD = $idUFCD"; 
# $sql="DELETE FROM $table WHERE idUFCD = $idUFCD LIMIT 1";
mysqli_query(CONNECT, $sql);

header("Location:ufcd.php?registoApagado");

?>

