<div class="container-fluid" style="margin-top:20px">
                       
<!-- sucesso -->
<?php if(isset($_GET['sucesso'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Registo efetuado com sucesso.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<!-- fracasso -->
<?php if(isset($_GET['fracasso'])) { ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Registo já consta da base de dados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<!-- estado -->
<?php if(isset($_GET['estadoAlterado'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Alteração efetuada na base de dados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<!-- registoAlterado -->
<?php if(isset($_GET['registoAlterado'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Alteração efetuada na base de dados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<!-- registoApagado -->
<?php if(isset($_GET['registoApagado'])) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Registo eliminado com sucesso da base de dados.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
</div>



