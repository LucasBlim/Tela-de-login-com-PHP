<?php
include('conexao.php');

//SE(EXISTIR($_POST['EMAIL']) OU EXISTIR($_POST['SENHA'])) {COMEÇAR}
if (isset($_POST['email']) || isset($_POST['senha'])) {

    //VERIFICA SE O EMAIL E SENHA ESTÃO PASSANDO SEM NENHUM CARACTERE
    if (strlen($_POST['email']) == 0) {     // STRLEN = QUANTIDADE DE CARACTERES
        echo "Preencha seu E-email!";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua Senha!";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']); //REAL_ESCAPE_STRING = LIMPA A STRING PARA EVITAR SQL INJECT
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; //SELECIONA OS USUARIOS QUE BATEM AS CREDENCIAIS COM O BANCO DE DADOS
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysql->error); //EXECUTA A CONSULTA, SE NAO FUNCIONAR DA ERRO

        $quantidade = $sql_query->num_rows; //NUM_ROWS = MANDA O SELECT PARA A VARIAVEL $QUANTIDADE

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc(); //FETCH_ASSOC() = CRIA UMA ARRAY ASSOCIATIVA CONTENDO AS INFORMAÇÕES DA LINHA

            //SE(NAO!EXISTIR($_SESSION)){
            if (!isset($_SESSION)) {                  //EXECUTA UMA SESSAO PARA O USUARIO CONSEGUIR FICAR LOGADO ENQUANTO ESTA NA PAGINA
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php"); //REDIRECIONA PARA PAGINA PAINEL.PHP

        } else {
            echo "Falha ao fazer login! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de login</title>
</head>

<body>
    <div class="MainLogin">
        <div class="LeftLogin">
            <h1>Faça login <br> e entre para nosso time!</h1>
            <img class="Animacao" src="images/working-animate.svg" alt="Working">
        </div>
        <div class="RightLogin">
            <div class="CardLogin">
                <h1>Login</h1>
                <div class="TextField">

                    <form class="TextField" action="" method="post" id="Myform">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Digite seu email...">
                        <label for="">Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha...">
                    </form>
                </div>
                <button form="Myform" class="BtnLogin" type="submit">Login</button>
                <button form="Myform" class="BtnCadastro" type="submit">Crie sua conta</button>
            </div>
        </div>
    </div>


</body>

</html>