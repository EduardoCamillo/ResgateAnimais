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
          $sql_query = $mysqli->query("SELECT * FROM arquivos LIMIT 3") or die($mysqli->error);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Pagina Usuário Comumn</title>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
    <meta name="viweport" content="width=device-width, initial-scale=1.0;">
    <metaa a charset="utf-8"/>
</head>
<body>
    
<header>
        
        <div class="center">
            <div class="logo left"><a href="">Resgate Animais </a></div><!--logo-->
         <nav class="desktop right">
             <ul>
                 <li><a href="#camp1">Home</a></li>
                 <li><a href="#camp2">Sobre</a></li>
                 <li><a href="#camp3">Fotos</a></li>
                 <li><a href="#camp4">Entre em contato</a></li>
             </ul>    
         </nav>
         <nav class="mobile right">
            <div class="botao-menu-mobile">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
         </nav>
         <div class="clear"></div><!--clear-->
         
        </header>
      
            
         
     </div>
 
     <section class="descricao-autor">
         <div class="center">
          <div class="w50 left">
              <h2><a name="camp2">Resgate um animal abandonado</a></h2>
             <p>O abandono de animais, em especial os animais domésticos, como cães e gatos, é um problema que cresce cada vez mais conforme o tempo passa.<br>
              <br>
              Existem mais de 30 milhões de animais abandonados, entre 10 milhões de gatos e 20 milhões de cães.<br>
                 <br>
                 O abandono é uma forma de maus-tratos ao animal e dessa forma, está enquadrado como um crime, de acordo com o Artigo 32 da Lei Federal nº 9605.</p>
              <br>
            
          </div><!--w50-->
          <div class="w50 left">
              <!--pegar imagem depois-->
              <img class="right" src="imagens/637e1db75bfa0.jpg" style="width:50%"/>
          </div><!---w50-->
          <div class="clear"></div>
          </div><!--center-->
      </section><!--descricao-autor-->
      <div class="slideshow-container"> <a name="camp3"></a>

    <div class="mySlides fade"> 
    <div class="numbertext">1 / 3</div>
    <img  src="imagens/6386b6f31ac5f.jpg" style="width: 100%" >
    <div class="text"><h1 style="color: black">Dog</h1></div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="imagens/6386b6fdcff39.jpg" style="width:100%">
    <div class="text"><h1 style="color: black"> Doguinho</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="imagens/6386b6e501d27.jpg" style="height:500px">
    <div class="text"><h1 style="color: black">Gato - Fêmea</h1></div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    }
    </script>
     
             
             <p id="demo" style="text-align: center">Clique no botão para obter sua localização: </p>
             &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="botaoEnviar" onclick="getLocation()">Clique aqui</button>
<div id="mapholder"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada nesse browser.";}
  }
 
            function showPosition(position)
            {
            lat=position.coords.latitude;
            lon=position.coords.longitude;
            latlon=new google.maps.LatLng(lat, lon)
            mapholder=document.getElementById('mapholder')
            mapholder.style.height='250px';
            mapholder.style.width='500px';
            
            var myOptions={
            center:latlon,zoom:14,
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl:false,
            navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
            };
            var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
            var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está Aqui!"});
            }
 
            function showError(error)
            {
            switch(error.code)
                {
                case error.PERMISSION_DENIED:
                x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
                break;
                case error.POSITION_UNAVAILABLE:
                x.innerHTML="Localização indisponível."
                break;
                case error.TIMEOUT:
                x.innerHTML="O tempo da requisição expirou."
                break;
                case error.UNKNOWN_ERROR:
                x.innerHTML="Algum erro desconhecido aconteceu."
                break;
                }
            }
</script>

 
            
           <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3676.387969821903!2d-47.10328708347889!3d-22.862122301147178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c701b143b069%3A0x590087383e5521b4!2sFatec%20Campinas%20-%20Faculdade%20de%20Tecnologia%20de%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1669761830530!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">  <p> Estamos aqui: </p></iframe>
             </div>
             -->
             </div><!--w50-->
             <div class="w50 left servicos-container">
             <h2 class="title "> <a name="camp4"> Preencha algumas questões referente ao PET!</h2>
             <div class="servicos">
             <ul>
                 <br>
               <div class="container">
                 <form action="" class="form-contact" method="post" tabindex="1" enctype="multipart/form-data">
                   <input type="text" class="form-contact-input" name="nome" placeholder="Nome"  />
                   <input type="email" class="form-contact-input" name="email" placeholder="Email"  />
                   <input type="tel" class="form-contact-input" name="tel" placeholder="Telefone" />
                   <input type="text" class="form-contact-input" name="end" placeholder="Endereço" />
                   <input name="arquivo" type="file" class="form-contact-input" placeholder="PHOTO" />
                   <textarea class="form-contact-textarea" name="conteudo" placeholder="Deixe uma mensagem" ></textarea>
                   <button type="submit" class="form-contact-button">Enviar</button>
                 </form>
               </div>
                  </ul>
             </div><!--serviços-->
             </div><!--w50-->
             <div class="clear"></div>
         </div><!--center-->
     </section><!--extras-->
     <footer>
     <h1>
        Esta será a página para o usuário comum, onde ele poderá adotar/postar animais. 
    </h1>
  <!--  <form method="post" enctype="multipart/form-data" action="">
            <label for="">Selecione o arquivo</label>
          <p>  <input name="arquivao" type="file">
            <button type="submit"> Enviar Arquivo </Button></p>
  
           -->
    
            
</body>
</html>