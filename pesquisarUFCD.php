<?php
# pesquisarUFCD.php?pesquisa=
require_once("connection.php"); // CONNECT
require_once("restriction.php"); // para assegurar a sessão
$pesquisa=$_GET['pesquisa'];
$table="ufcd";
$sql ="SELECT * FROM $table
WHERE designacao LIKE '%$pesquisa%' OR codigo LIKE '%$pesquisa%'";
$query=mysqli_query(CONNECT,$sql);
$total=mysqli_num_rows($query);
if($total==0){?>
    <h3 style="color:Red">Sem resultados!!!</h3>
<?php } else { ?>
   
   <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Designação</th>
                                            <th></th>
                                            <th></th>
                                            <th></th> 
                                            <th></th>                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        while($fetch=mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?php echo $fetch['codigo'];?></td>
                                            <td><?php echo $fetch['designacao'];?></td>
                                            <td><a class="btn btn-primary" href="?mostrarCopiar&idUFCD=<?php echo $fetch['idUFCD'];?>">Copiar</a></td>
                                            <td><a class="btn btn-warning" href="?mostrarAlterar&idUFCD=<?php echo $fetch['idUFCD'];?>">Alterar</a></td>
                                            <td><a class="btn btn-danger" href="?mostrarApagar&idUFCD=<?php echo $fetch['idUFCD'];?>&#apagar">Apagar</a></td>
                                            <td><a class=""
                                            href="ativacaoUFCD.php?idUFCD=<?php echo $fetch['idUFCD'];?>&estado=<?php echo $fetch['estado'];?>">
                                                <?php if($fetch['estado']==1) { echo "Ativo"; } else { echo "Inativo"; }; ?></a></td>
                                        </tr>
                                        <?php  } ?>
                                        

                                    </tbody>
                                   
                                </table>


<?php } ?>




