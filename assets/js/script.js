 // ==== MODAL ENVIAR OS COMENTARIOS DO PERFIL DO USUÁRIO ======

$(function(){

  $('#comentarios').bind('submit', function(e){

    e.preventDefault();

   var id = $('input[name=id]').val();
   var comentarios = $("#comentarios textarea").val();          

   
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/comentarios/comentUsuario',
      data:{id:id, comentarios:comentarios},
      success:function(resultado) { // se tudo ocorrer bem entra aqui
            $("#atualizar_comentarios").html(resultado); // inserindo resultado na div 
 
            
      }
   
    });

  });

});




// ==== MODAL ENVIAR OS COMENTARIOS DO PERFIL DO ADMINISTRADOR ======
function enviarCometarios(id){

  

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/comentarios/formComentarios?id='+id,
      data:{id:id},
      beforeSend:function(){
        $('#modal_comentarios').find('.modal-body').html('Carregando...');
        $('#modal_comentarios').modal('show');
      },
      success:function(html){
          $('#modal_comentarios').find('.modal-body').html(html);
          $('#modal_comentarios').find('.modal-body').find('form').on('submit', salvarComentarios);

          $('#modal_comentarios').modal('show');
      }

   }); 

}

function salvarComentarios(e){
        e.preventDefault();

              var id = $('input[name=id]').val();
              var comentarios = $('textarea').val();   


           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/comentarios/InserirComentAdmin',
             data:{id:id, comentarios:comentarios},
             success:function(resultado){
             $('#modal_comentarios').modal('hide');
            window.location.href = window.location.href;
             }

        });
}

// SCRIPT PARA ENVIAR O ARQUIVO PARA O BANCO DE DADOS

$(function(){

  $('#form_ulpoad').on('submit', function(e){

    e.preventDefault();

    var form = $('#form_ulpoad')[0];
    var data = new FormData(form);

  /* criando uma div de carregamento temporário  e inserindo */
    $("body").append('<div class="carregando">Fazendo Agendamento, Aguarde...</div>'); 
    $("body").append('<img src="https://sofdev.com.br/subdominio/George/conhecermais/assets/images/loading.gif" alt="" id="loading" class="loading"/>'); 
    
    $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/aulas/montarAulas',
      data:data,
      contentType:false,
      processData:false,
      success:function(resultado) { // se tudo ocorrer bem entra aqui
         $(".carregando").fadeOut(300).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
        $(".loading").fadeOut(300).remove(); // ocultando div de carregamento quando o ajax carregar e logo após apagando o mesmo
        //$("#resultado").html(resultado); // inserindo resultado na div 
        if(resultado != "sucesso"){
        window.location.href = "https://sofdev.com.br/subdominio/George/conhecermais/aulas/ajaxAgendamento";
       }else{

         $("#message").html("<div class='alert alert-primary' role='alert'>Essa data já foi agendada /ou arquivo muito grande !</div>");
       }
      
    }

    
    });

  });

});


//MODAL PARA EDITAR O AGENDAMENTO
function editarAgendamento(id){

  

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/agenda/editarAgendamento',
      data:{id:id},
      beforeSend:function(){
        $('#modal_editar').find('.modal-body').html('Carregando...');
        $('#modal_editar').modal('show');
      },
      success:function(html){
          $('#modal_editar').find('.modal-body').html(html);
          $('#modal_editar').find('.modal-body').find('form').on('submit', salvarEditar);

          $('#modal_editar').modal('show');
      }

   }); 

}

function salvarEditar(e){
        e.preventDefault();

              var id = $('input[name=id]').val();
              var dataInicio = $('input[name=dataInicio]').val();
              var dataFim = $('input[name=dataFim]').val();
              var horaInicio = $('input[name=horaInicio]').val();
              var horaFim = $('input[name=horaFim]').val();


           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/agenda/updateAgenda',
             data:{id:id, dataInicio:dataInicio, dataFim:dataFim, horaInicio:horaInicio, horaFim:horaFim},
             success:function(result){
             $('#modal_editar').modal('hide');
             window.location.href = window.location.href;
 
             }

        });
}


//MODAL PARA DELETAR O AGENDAMENTO
function deletarAgendamento(id){


   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/agenda/abrirModalDeletar',
      data:{id:id},
      beforeSend:function(){
        $('#modal_editar').find('.modal-body').html('Carregando...');
        $('#modal_editar').modal('show');
      },
      success:function(html){
          $('#modal_editar').find('.modal-body').html(html);
          $('#modal_editar').find('.modal-body').find('form').on('submit', deletar);

          $('#modal_editar').modal('show');
      }

   }); 

}

function deletar(e){
        e.preventDefault();

              var id = $('input[name=id]').val();

           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/agenda/deletarAgendamento',
             data:{id:id},
             success:function(result){
             $('#modal_editar').modal('hide');
             window.location.href = window.location.href;
 
             }

        });
}


//MODAL PARA MOSTRAR VIDEO
function ViewVideo(id){

  

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/video',
      data:{id:id},
      beforeSend:function(){
        $('#modal_video').find('.modal-body').html('Carregando...');
        $('#modal_video').modal('show');
      },
      success:function(html){
          $('#modal_video').find('.modal-body').html(html);
          $('#modal_video').find('.modal-body').find('form').on('submit', salvarVideo);

          $('#modal_video').modal('show');
      }

   }); 

}

function salvarVideo(e){
        e.preventDefault();

              var id = $('input[name=id]').val();


           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/fecharModal',
             data:{id:id},
             success:function(result){
             $('#modal_video').modal('hide');
             window.location.href = window.location.href;
 
             }

        });
}


//MODAL TROCAR DE SENHA DO ADMINISTRADOR

function trocarSenha(id){

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/usuario/modalTrocarSenha',
      data:{id:id},
      beforeSend:function(){
        $('#modal_trocarSenha').find('.modal-body').html('Carregando...');
        $('#modal_trocarSenha').modal('show');
      },
      success:function(html){
          $('#modal_trocarSenha').find('.modal-body').html(html);
          $('#modal_trocarSenha').find('.modal-body').find('form').on('submit', salvarSenha);

          $('#modal_trocarSenha').modal('show');
      }

   }); 

}

function salvarSenha(e){
        e.preventDefault();

              var id = $('input[name=id]').val();
              var senha = $('input[name=senha]').val();

           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/usuario/modalTrocarSenha',
             data:{id:id, senha:senha},
             success:function(result){
             $('#modal_trocarSenha').modal('hide');
              $("#messagem").html("<div class='alert alert-success' role='alert'>Senha trocado com sucesso!</div>");
             }

        });
}


// MODAL COM AS NOVIDADE PARA O CURSO

function modalMensagem(id){

   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/mensagem/formMensagem',
      data:{id:id},
      beforeSend:function(){
        $('#modal_mensagens').find('.modal-body').html('Carregando...');
        $('#modal_mensagens').modal('show');
      },
      success:function(html){
          $('#modal_mensagens').find('.modal-body').html(html);
          $('#modal_mensagens').find('.modal-body').find('form').on('submit', Fehcar);

          $('#modal_mensagens').modal('show');

      }

   }); 

}

function Fehcar(e){
        e.preventDefault();

              var id = $('input[name=id]').val();

           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/mensagem/fecharMsg',
             data:{id:id},
             success:function(result){
             $('#modal_mensagens').modal('hide');
             }

        });
}

//MODAL DELETAR USUARIO ADMIN 
function deletarAdmin(id){


   $.ajax({
      type:'POST',
      url:'https://sofdev.com.br/subdominio/George/conhecermais/usuario/abrirModalExcluir',
      data:{id:id},
      beforeSend:function(){
        $('#modal_excluir_admin').find('.modal-body').html('Carregando...');
        $('#modal_excluir_admin').modal('show');
      },
      success:function(html){
          $('#modal_excluir_admin').find('.modal-body').html(html);
          $('#modal_excluir_admin').find('.modal-body').find('form').on('submit', delAdmin);

          $('#modal_excluir_admin').modal('show');
      }

   }); 

}

function delAdmin(e){
        e.preventDefault();

              var id = $('input[name=id]').val();


           $.ajax({
             type:'POST',
             url:'https://sofdev.com.br/subdominio/George/conhecermais/usuario/excluirAdmin',
             data:{id:id},
             success:function(result){
             $('#modal_excluir_admin').modal('hide');
             window.location.href = window.location.href;
 
             }

        });
}
