<?php
# http://localhost/projeto/alterarUFCD.php?idUFCD=10&codigo=4587&designacao=Teste+4587

require_once("connection.php");
require_once("restriction.php");

$table="ufcd";
$codigo=addslashes($_GET['codigo']);
$designacao=addslashes($_GET['designacao']);
$idUFCD=$_GET['idUFCD'];
# testo a existencia do código antes de alterar 

# caso não exista -> regista
$sql="UPDATE $table SET codigo = '$codigo', designacao = '$designacao' WHERE idUFCD = $idUFCD";
mysqli_query(CONNECT, $sql);
# caso exista não regista e sai com a mensagem 

# alterar ou update
header("Location:ufcd.php?registoAlterado");

?>