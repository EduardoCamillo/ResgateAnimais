<?php
    include('conectar.php');    
    if(isset($_POST['email']) || isset($_POST['senha'])) {
        //caso tenha sido digitado 0 caracteres em e-mail
        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        //caso tenha sido digitado 0 caracteres em senha
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            echo "Olá mundo!";
            /*//$email = $_POST['email'];
            $sql_code = "INSERT INTO usuário (id, nome, email, senha, privilégio) VALUES (NULL,'Eduzaao', '$email', '$senha', '1') ";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        */
        $mysqli->query("INSERT INTO usuário (nome, email, senha, privilégio) VALUES ( '$nome', '$email', $senha, '1') ") or die($mysqli->$error);
        echo "<p> Usuário cadastrado com sucesso!</p>";
        }
    } 
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        </p>
        <p>
        <label>Nome Completo</label>
            <input type="text" name="nome">
        <p>
            <button type="submit">Cadastrar</button>
           <a href="index.php"> Efetuar Login </a>
        </p>    
</body>
</html>