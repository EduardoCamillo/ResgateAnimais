<?php
include('conectar.php');

//verifica se foi digitado algo em e-mail e em senha
if(isset($_POST['email']) || isset($_POST['senha'])) {
    //caso tenha sido digitado 0 caracteres em e-mail
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    //caso tenha sido digitado 0 caracteres em senha
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        //limpando e-mail e senhas para evitar vulnerabilidades: sql injection
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        //consulta no banco onde será verificado o e-mail na tabela conforme o e-mail digitado
        $sql_code = "SELECT * FROM usuário WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        //variavel quantidade será responsável por verificar se houve registros na consulta executada no banco
        $quantidade = $sql_query->num_rows;
        
        //vericia se há registros após a consulta no banco
        if($quantidade == 1) {
            
            //verifica o privilégio de cada usuário
            while ($percorrer = mysqli_fetch_array($sql_query))
            $adm = $percorrer['privilégio'];
           /* if($adm == 1){
                echo 'USER ADM';
            }else if ($adm > 1){
                echo 'USER COLABORADOR';
            }else{
                echo 'USUÁRIO COMUM';
            }*/
            //pega retorno da consulta do banco e coloca na variavel usuario
            $usuario = $sql_query->fetch_assoc();

            //iniciando a sessão: foi utilizado a variavel SESSION pois ela continua valida por um determinado periodo de tempo
            if(!isset($_SESSION)) {
                session_start();
            }

                switch($adm){
                    case 1:
                        header("Location: comum.php");
                        break;

                    case 2:
                        header("Location: ong.html");
                        break;

                    case 3:
                        header("Location: admin.html");
                        break;

                    default:
                        echo 'ih';
                }
           //$_SESSION['id'] = $usuario['id'];
            //$_SESSION['nome'] = $usuario['nome'];

            //após login, redireciona para a página project.html
          // header("Location: project.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBbmQv9eV4i6r-rKZ-v84fmzfgUkc0nHuc",
    authDomain: "project-lab-eng-soft.firebaseapp.com",
    projectId: "project-lab-eng-soft",
    storageBucket: "project-lab-eng-soft.appspot.com",
    messagingSenderId: "333224040039",
    appId: "1:333224040039:web:2188deca394937296ea6c2",
    measurementId: "G-2E4QQB3KKE"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
            <a href="cadastrar.php"> Cadastre-se </a>
        </p>    
    </form>
</body>
</html>