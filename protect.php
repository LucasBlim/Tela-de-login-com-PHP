<?php 
if(!isset($_SESSION)) {
    session_start();    //CONTINUA COM A SESSÃO VIVA
}

if(!isset($_SESSION['id'])) {
    die("Faça o login para acessar esta página! <p><a href=\"index.php\">Entrar</a></p>");

}


?>