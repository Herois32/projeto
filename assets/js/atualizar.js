$(function(){

  $('#form').on('submit', function(e){

    e.preventDefault();

    var form = $('#form')[0];
    var data = new FormData(form);

  /* criando uma div de carregamento temporário  e inserindo */
    $("body").append('<div class="carregando">Fazendo Importação, Aguarde...</div>'); 
    $("body").append('<img src="https://lh3.googleusercontent.com/proxy/TsA9F_RvdJCu0m9dhb-rmNWa8u-xow2ooLUjS1sLGoc-6ys1aoi1xAhW7J4JRshyq3LEs9Wn_rhxvETrC4WU9Xq2Tht7h2x-O-WYqdKf8M6Gfwpe133hhfVtUQYFj8hGT6qkldFiMADBEg" alt="" id="loading" class="loading"/>'); 
    
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/aulas/montarAulas',
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

 // ==== MODAL TROCAR SENHA DO USUARIO PELO ADMIN ======
function trocarSenha(id){

  

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/senha/formSenha?id='+id,
      data:{id:id},
      beforeSend:function(){
        $('#modal').find('.modal-body').html('Carregando...');
        $('#modal').modal('show');
      },
      success:function(html){
          $('#modal').find('.modal-body').html(html);
          $('#modal').find('.modal-body').find('form').on('submit', salvar);

          $('#modal').modal('show');
      }

   }); 

}

function salvar(e){
        e.preventDefault();

                var id = $('input[name=id]').val();
                var senha = $('input[name=senha]').val();


           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/senha/trocarSenha',
             data:{id:id, senha:senha},
             success:function(){
             alert("Senha alterada com sucesso!");
             $('#modal').modal('hide');
 
             }

        });
}

 // ==== MODAL PARA ATUALIZAR O USUÁRIO ADMIN ======
function atualizarUsr(id){

  
   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/usuario/edit/'+id,
      data:{id:id},
      beforeSend:function(){
        $('#modal').find('.modal-body').html('Carregando...');
        $('#modal').modal('show');
      },
      success:function(html){
          $('#modal').find('.modal-body').html(html);
          $('#modal').find('.modal-body').find('form').on('submit', salvarUsr);

          $('#modal').modal('show');
      }

   }); 

}

function salvarUsr(e){
        e.preventDefault();

                var id = $('input[name=id]').val();           	
                var nome = $('input[name=nome]').val();
                var status = $("#inputState option:selected").val();
                
                
           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/usuario/edit/'+id,
             data:{nome:nome, status:status},
             success:function(){
             alert("Dados alterados com sucesso!");
             window.location.href = window.location.href;
 				
             }

        });
}
/*   TABELA ZEBRADA   */
$(document).ready(function() {
   $('.table tr:odd').css('background-color', '#F0F8FF');
   $('.table tr:even').css('background-color', '#fff');  
});


/*  SCRIPT PARA O ANALITICO */
$(function(){

  $('#form').on('submit', function(e){

    e.preventDefault();
    var dataMes = $('input[name=dataMes]').val();
   
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/ajaxrelatorio/getAnalitico',
      data:{dataMes:dataMes},
      success:function(r) { // se tudo ocorrer bem entra aqui
            $(".borda").html(r); // inserindo resultado na div 
 
            
      }
   
    });

  });

});

/*  SCRIPT PARA O RELATORIO DIA POR CATEGORIA */
$(function(){

  $('#form_relat_dia').on('submit', function(e){

    e.preventDefault();

       var categoria = $("#inputCategoria option:selected").val();
   
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/ajaxrelatdias/',
      data:{categoria:categoria},
      success:function(r) { // se tudo ocorrer bem entra aqui
            $(".borda").html(r); // inserindo resultado na div 
 
            
      }
   
    });

  });

});

/*  SCRIPT PARA O RELATORIO MÊS */
$(function(){

  $('#form_relatorio_mes').on('submit', function(e){

    e.preventDefault();

       var dataInicio = $('input[name=dataInicio]').val();
       var dataFim = $('input[name=dataFim]').val();
   
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/ajaxrelatoriomes/',
      data:{dataInicio:dataInicio, dataFim:dataFim},
      success:function(r) { // se tudo ocorrer bem entra aqui
            $(".borda").html(r); // inserindo resultado na div 
 
            
      }
   
    });

  });

});


/*  SCRIPT PARA O RELATORIO ADMINISTRADOR */
$(function(){

  $('#form_relatorio_admin').on('submit', function(e){

    e.preventDefault();

       var dataInicio = $('input[name=dataInicio]').val();
       var dataFim = $('input[name=dataFim]').val();
   
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/ajaxrelatoriomes/graficoAdmin',
      data:{dataInicio:dataInicio, dataFim:dataFim},
      success:function(r) { // se tudo ocorrer bem entra aqui
            $(".borda").html(r); // inserindo resultado na div 
 
            
      }
   
    });

  });

});

/*  SCRIPT PARA ATUALIZAR O A TABELA NO HOME */

function atualizar(){  
        // Exibindo frase
        $('#setTime').load('https://sofdev.com.br/chamados/ajaxtabela');
} 
// Definindo intervalo que a função será chamada
setInterval("atualizar()", 90000); 
// Quando carregar a página
$(function() {
    // Faz a primeira atualização
    atualizar();
});
