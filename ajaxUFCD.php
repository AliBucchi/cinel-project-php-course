<?php

require_once("restriction.php");
$pesquisa=$_GET['pesquisa'];
$table="ufcd";
$sql="SELECT * FROM $table WHERE codigo LIKE '%$pesquisa%' OR designacao LIKE '%$pesquisa%'";
require_once("connection.php");
$query=mysqli_query(CONNECT,$sql);
$total=mysqli_num_rows($query);

if($total==0){?>
<p>Não há registos para a pesquisa</p>
<?php } 

if($total>0){?>

<p>Foram encontrados registos para a pesquisa</p>

<?php } ?>