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


//============= Ajax REMESSA ==============

$(function(){

  $('#form').on('submit', function(e){

    e.preventDefault();

    var form = $('#form')[0];
    var data = new FormData(form);

  /* criando uma div de carregamento temporário  e inserindo */
    $("body").append('<div class="carregando">Fazendo Importação, Aguarde...</div>'); 
    $("body").append('<img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="" id="loading" class="loading"/>'); 
    
    $.ajax({
      type:'POST',
      url:'http://localhost/consiglog/remessa/importarRemessa',
      data:data,
      contentType:false,
      processData:false,
      success:function(resultado) { // se tudo ocorrer bem entra aqui
         $(".carregando").fadeOut(300).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
        $(".loading").fadeOut(300).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
      $("#resultado").html(resultado); // inserindo resultado na div 
    }
    
    });

  });

});
