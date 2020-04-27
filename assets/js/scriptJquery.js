$(function(){

  $('#form-login').on('submit', function(e){

    e.preventDefault();
    var email = $('input[name=email]').val();
    var password = $('input[name=password]').val();

    /*var form = $('#form-login')[0];
    var data = new FormData(form);*/

  /* criando uma div de carregamento temporário  e inserindo */
    $("body").append('<div class="carregando">Fazendo autenticação, Aguarde...</div>'); 
    $("body").append('<img src="https://www.legalizeimobiliaria.com.br/assets/img/gif/p-load.gif" alt="" id="loading" class="loading"/>'); 
    
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/home',
      data:{email:email, password:password},
      success:function(resultado) { // se tudo ocorrer bem entra aqui
         $(".carregando").fadeOut(600).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
        $(".loading").fadeOut(600).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
       //$("html").html(resultado); // inserindo resultado na div 
         window.location.href = 'https://sofdev.com.br/home/chamados'; 
    }
    

    
    });

  });

});



