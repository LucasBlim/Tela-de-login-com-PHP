<?php 
if(!isset($_SESSION)) {
    session_start();
}

session_destroy();  //DESTROI A VARIAVEL QUE TE DEIXA LOGADO E FAZ COM QUE DE LOGOUT NA PAGINA

header("Location: index.php");

?>