<?php

session_start();
session_destroy();
# destroi todas as variáveis de sessão criadas no login

if(isset($_GET['msg2'])){
    $path="msg=Expirado";
}
if(isset($_GET['msg1'])){
    $path="msg=logOut";
}

header("Location:login.html?$path");

?>