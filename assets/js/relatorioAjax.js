/*  SCRIPT PARA O ANALITICO 
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

});*/