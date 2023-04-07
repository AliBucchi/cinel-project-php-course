<?php
require_once("restriction.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Turma62</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script>
        function pesquisar(p) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("resultadoUFCD").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxUFCD.php?pesquisa=" + p, true);
            xmlhttp.send();
        }
    </script>

<script>
function pesquisarUFCD(str) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("mostrarTabelaUFCD").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "pesquisarUFCD.php?pesquisa="+str, true);
    xmlhttp.send();
  }

</script>


</head>

<body id="page-top">
    <div id="wrapper">

     <!-- leftNav é o aside ou menu com os links -->
     <?php require_once("leftNav.php");?>          

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                 <!-- Barra de navegação onde também estão informações sobre o utilizador -->
                 <?php require_once("topNav.php");?>
                 <!-- O ficheiro mensagens.php guarda as mensagens passadas após comunicação com a BD -->
                <?php require_once("mensagens.php");?>
                <!-- tabela com as ufcds -->
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">UFCDS</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Listagem de UFCDS</p>
                            <p id="resultadoUFCD"></p>
                            
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input id="pesquisa" onkeyup="pesquisarUFCD(pesquisa.value)" type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                               
                            <div id="mostrarTabelaUFCD">
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
                                        require_once("connection.php");
                                        $table="ufcd";
                                        $sql="SELECT * FROM $table";
                                        $query=mysqli_query(CONNECT, $sql);
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

                            </div>

                            


                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- fim tabela com as ufcds -->                     
            </div>          
              
            <div class="container-fluid">
            <?php if(!isset($_GET['mostrarRegistar'])) { ?>
            <a href="?mostrarRegistar">Nova UFCD</a>
            <?php } ?>

                <!-- painel do registo -->                
                <?php if(isset($_GET['mostrarRegistar'])) { ?>
                        <div class="col-lg-12">
                            <div class="card border-0 shadow-lg rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Registar UFCD</h3>
                                </div>
                                <div class="card-body">
                                    <form action="registarUFCD.php" method="GET">
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputCodigo">Código</label><input minlength="4" maxlength="4" required class="form-control form-control" type="text" id="inputCodigo" placeholder="Introduza o código da UFCD" name="codigo" autofocus></div>
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputDesignacao">Designação</label>
                                        
                                        <?php if(isset($_GET['designacao'])){?>
                                        <input required value="<?php echo $_GET['designacao'];?>" class="form-control form-control" type="text" id="inputDesignacao" placeholder="Introduza a designação da UFCD" name="designacao">
                                    <?php } ?>
                                    
                                    <?php if(!isset($_GET['designacao'])){?>
                                        <input required value="" class="form-control form-control" type="text" id="inputDesignacao" placeholder="Introduza a designação da UFCD" name="designacao">
                                    <?php } ?>
                                    </div>


                                        <div class="d-flex justify-content-between align-items-center mt-4 mb-0"><button class="btn btn-primary" type="submit">Registar UFCD</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                   <!-- fim do painel do registo -->

<!-- inicio do painel de alteração de registo -->
<?php if(isset($_GET['mostrarAlterar'])) {    
    $idUFCD=$_GET['idUFCD'];   
    $sql="SELECT * FROM $table WHERE idUFCD = $idUFCD";
    $query=mysqli_query(CONNECT, $sql);
    $fetch=mysqli_fetch_assoc($query);
    ?>
<!-- aqui aparece o formulário de alteração -->
<div class="col-lg-12">
                            <div class="card border-0 shadow-lg rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Alterar UFCD</h3>
                                </div>
                                <div class="card-body">
                                    <form action="alterarUFCD.php" method="GET">
                                        <input type="hidden" name="idUFCD" value="<?php echo $idUFCD;?>">
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputCodigo">Código</label>
                                        <input value="<?php echo $fetch['codigo'];?>" minlength="4" maxlength="4" required class="form-control form-control" type="text" id="inputCodigo" placeholder="Introduza o código da UFCD" name="codigo" autofocus></div>
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputDesignacao">Designação</label>
                                        <input value="<?php echo $fetch['designacao'];?>" required value="" class="form-control form-control" type="text" id="inputDesignacao" placeholder="Introduza a designação da UFCD" name="designacao">
                                    </div>
                                        <div class="d-flex justify-content-between align-items-center mt-4 mb-0"><button class="btn btn-primary" type="submit">Alterar UFCD</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
    <?php } ?>
<!-- fim de alteração de registo -->




<!-- inicio do painel de duplicação de registo -->
<?php if(isset($_GET['mostrarCopiar'])) {    
    $idUFCD=$_GET['idUFCD'];   
    $sql="SELECT * FROM $table WHERE idUFCD = $idUFCD";
    $query=mysqli_query(CONNECT, $sql);
    $fetch=mysqli_fetch_assoc($query);
    ?>
<!-- aqui aparece o formulário de cópia -->
<div class="col-lg-12">
                            <div class="card border-0 shadow-lg rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Registar UFCD</h3>
                                </div>
                                <div class="card-body">
                                    <form action="registarUFCD.php" method="GET">                                       
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputCodigo">Código</label>
                                        <input value="<?php echo $fetch['codigo'];?>" minlength="4" maxlength="4" required class="form-control form-control" type="text" id="inputCodigo" placeholder="Introduza o código da UFCD" name="codigo" autofocus></div>
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputDesignacao">Designação</label>
                                        <input value="<?php echo $fetch['designacao'];?>" required value="" class="form-control form-control" type="text" id="inputDesignacao" placeholder="Introduza a designação da UFCD" name="designacao">
                                    </div>
                                        <div class="d-flex justify-content-between align-items-center mt-4 mb-0"><button class="btn btn-primary" type="submit">Registar UFCD</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
    <?php } ?>
<!-- fim de duplicação  de registo -->






<!-- painel de apagar registo -->
<?php if(isset($_GET['mostrarApagar'])) {    
    
    $idUFCD=$_GET['idUFCD'];   
    $sql="SELECT * FROM $table WHERE idUFCD = $idUFCD";
    $query=mysqli_query(CONNECT, $sql);
    $fetch=mysqli_fetch_assoc($query);

    ?>
<!-- aqui aparece o formulário de apagar resgisto -->
<div class="col-lg-12">
                            <div class="card border-0 shadow-lg rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4" id="apagar">Apagar UFCD</h3>
                                </div>
                                <div class="card-body">
                                    <form action="apagarUFCD.php" method="GET">
                                        <input type="hidden" name="idUFCD" value="<?php echo $idUFCD;?>">
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputCodigo">Código</label>
                                        <input  value="<?php echo $fetch['codigo'];?>" minlength="4" maxlength="4" readonly class="form-control form-control" type="text" id="inputCodigo"></div>
                                        <div class="mb-3"><label class="form-label small mb-1" for="inputDesignacao">Designação</label>
                                        <input value="<?php echo $fetch['designacao'];?>" readonly value="" class="form-control form-control" type="text" id="inputDesignacao">
                                    </div>
                                        <div class="d-flex justify-content-between align-items-center mt-4 mb-0"><button class="btn btn-danger" type="submit">Apagar definitivamente a UFCD</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
    <?php } ?>
<!-- fim de ateração de registo -->



</div>

           
           
               <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Turma62 2023</span></div>
                </div>
            
            
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>