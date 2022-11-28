<?php
include ('conectar.php');
if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];
    if($arquivo['error']){
        die("falaha ao enviar o arquivo");
    }
    else{
        if($arquivo['size'] > 2097152){
            die("Arquivo muito grande! Max: 2mb");
        }
        else{
            $pasta = "imagens/";
            $nomeDoArquivo = $arquivo['name'];
            //gera um nome aleatorio para a imagem, evitando nomes iguais
            $novoNomeDoArquivo = uniqid();
            //pega a extensão do arquivo
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if($extensao != "jpg" && $extensao != "png"){
                die("Tipo de arquivo inválido.");
            }else{
                $path =  $pasta . $novoNomeDoArquivo . "." . $extensao;
                $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
                if($deu_certo){
                    $mysqli->query("INSERT INTO arquivos (nome, path) VALUES ('$novoNomeDoArquivo', '$path') ") or die($mysqli->$error);
                    echo "<p> Arquivo enviado com sucesso! Para acessá-lo clique aqui: <a href=\"imagens/$novoNomeDoArquivo.$extensao\"> Clique aqui. </a> </p>";
                }else
                    echo "<p> Falha ao enviar arquivo</p>" ;
            }
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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Pagina Usuário Comumn</title>
</head>
<body>
    <h1>
        Esta será a página para o usuário comum, onde ele poderá adotar/postar animais. 
    </h1>
    <form method="post" enctype="multipart/form-data" action="">
            <label for="">Selecione o arquivo</label>
          <p>  <input name="arquivo" type="file">
            <button type="submit"> Enviar Arquivo </Button></p>
            
</body>
</html>