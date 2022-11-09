<?php
include('conectar.php');
$consulta = "SELECT * FROM produto";
$resultado = $mysqli->query($consulta);

if (!$resultado) die($conexão->error);
$linhas = $resultado->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
    crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>LojaApple</title>
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div>
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-white">Loja Apple</a></li>
              <li><a href="#" class="nav-link px-2 text-secondary">Produtos</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Sobre Nós</a></li>
            </ul>
            <div class="text-end">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg><i class="bi bi-cart"></i> </a>
            </div>
          </div>
        </div>
      </header>
        <div class="row">
            <div class="col-3 mb-3 mt-3 ms-3">
                <div class="card">
                    <div class="card-body">
                        <?php
                            for ($j = 0 ; $j < $linhas ; ++$j)
                            {
                            echo '<br>';
                            $tabela = '<table>';
                            $tabela = ' <div class="card">';
                            $tabela = '<div class="card-body">';
                            $tabela = '<h6 class="card-tittle">';
                            $tabela = '<h6 class="card-tittle">';
                            $resultado->data_seek($j);
                            echo 'Nome: ' . $resultado->fetch_assoc()['nome'] . '<br>';
                            $tabela = '</h6>';
                            $tabela = '<p>';
                            $resultado->data_seek($j);
                            echo 'Preço: ' . $resultado->fetch_assoc()['valor'] . '<br>';
                            $tabela = '</p>';
                            $tabela = '<small>';
                            $resultado->data_seek($j);
                            echo 'quantidade de estoque:  ' . $resultado->fetch_assoc()['estoque'] . '<br>';
                            $tabela = '</small>';
                            $tabela = '<p>';
                            $tabela = '<bottom>';
                            $tabela = '</bottom>';
                            $tabela = '</p>';
                            $tabela = '</div>';
                            $tabela = '</table>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</body>
</html