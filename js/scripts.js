$(function(){
    //aqui vai todo nosso código de JavaScript.
    $('nav.mobile').click(function(){
        //o que vai acontecer quando clicarmos na nav.mobile!
        var listaMenu = $('nav.mobile ul');
        //o comando abaixo faz o mesmo que o listamenu.slidetoggle();
        /*
        if(listaMenu.is(':hidden')==true){
        listaMenu.fadeIn();
        }
        else{
            listaMenu.fadeOut();
          }
          */
        listaMenu.slideToggle();
    })
    
})