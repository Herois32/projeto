
<script type="text/javascript">

//var intervalo = setInterval(function() { $('#here').load('here'); }, 3000);


</script>


<!-- ALERT SE A RESPOSTA DO CHAMADO ESTIVER TUDO CERTO  -->
  <?php echo (!empty($msg) ? $msg : '' ); ?>   

<?php
  $aberto = '<div class="font-aberto">Aberto</div>';
  $andamento = '<div class="font-andamento">Em Andamento</div>';
  $fechado = '<div class="font-fechado">Fechado</div>';
  $reaberto = '<div class="font-reaberto">Reaberto</div>';
  $anexo = '<img src="https://sofdev.com.br/assets/images/anexo.png" class="img-responsive" alt="Arquivo">'; 
 $sem_anexo = ''; 

 ?> 

 <h6 class="border-bottom border-gray pb-2 mb-0">Todos os Chamados</h6>
 
<div id=""> 

  <div class="altera-fontes" id="atualizacao">

<table class="table table-bordered table-hover" id="minhaTabela" cellspacing="0" style="width: 100%;table-layout:fixed">
 <thead>
    <tr align="center">
      <th width="9%" scope="col">Ticket</th>
      <th scope="col">Usuário</th> 
      <th scope="col">Categoria</th>
      <th width="15%" scope="col">Data da Abertura</th>
      <th scope="col">Última Atualização</th>
      <th width="8%" scope="col">Anexo</th>
      <th width="10%" scope="col">Status</th>
    </tr>
  </thead>
    <tbody>
   <?php foreach($lista as $key): ?>  

 <tr align="center">        
  <td><a href="<?php echo BASE_URL; ?>chamados/respChamado/<?php echo $key['ch_id']; ?>"><?php echo $key['ch_id']; ?></a></td>
        <td><?php echo $key['usr_nome']; ?></td>
        <td><?php echo $key['ch_categoria']; ?></td>
        <td><?php echo (date("d/m/Y", strtotime($key['ch_data_abertura']))); ?></td>
        <td><?php echo (date("d/m/Y H:i:s", strtotime($key['ch_data_ultima_atulizacao']))); ?></td>
        <td><a href="<?php echo BASE_URL; ?>arquivo/dowloand?arquivo=<?php echo $key['ch_arquivo']; ?>"><?php echo (!empty($key['ch_arquivo']) ? $anexo : $sem_anexo ); ?></td>
        <td><?php if($key['ch_status'] == "Aberto"){ echo $aberto; }else if($key['ch_status'] == "Em andamento"){ echo $andamento; }else if($key['ch_status'] == "Reaberto"){ echo $reaberto; }else{ echo $fechado; } ?></td>        
      </tr>
    <?php endforeach; ?>             
    </tbody>
  </table>
</div>


  
   </div>     
 </div>     


<!-- </div> -->
      
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Comentários</h6>
        <div id="atualizar_comentarios">
        <?php if(!empty($listar)): ?>
        <?php foreach($listar as $value): ?>
        <div class="media text-muted pt-3">
       <?php if($value['cm_idRoles'] == 2 ): ?>
          <img src="https://cdn4.iconfinder.com/data/icons/gray-toolbar-8/512/xxx034-512.png"  width="45" height="45" alt="" class="mr-2 rounded">
          <?php endif; ?>

       <?php if($value['cm_idRoles'] == 1 ): ?>
          <img src="https://image.winudf.com/v2/image1/Y29tLnByb2R1Y3Rpb24uYWNob3VyX2FyLmdzaG1vYmlsZWhlbHBkZXNrX2ljb25fMTU1Mzk4NTI4NV8wMzc/icon.png?w=170&fakeurl=1"  width="45" height="45" alt="" class="mr-2 rounded">
          <?php endif; ?>

          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <form >
            <div class="d-flex justify-content-between align-items-center w-100">
              
              <strong class="text-gray-dark"><?php echo $value['cm_nome']; ?></strong>
             <?php if($value['cm_nome'] != $_SESSION['cNome'] AND $value['cm_idRoles'] == 2 ): ?>
              <a href="javascript:;" onclick="enviarCometarios('<?php echo $value['cm_idUsr']; ?>')" >Comentar</a>
            <?php endif; ?>
            </div>
            <span class="d-block"><?php echo (date("d/m/Y H:i:s", strtotime($value['cm_data']))); ?></span>
            <?php echo $value['cm_cometarios']; ?>
            
          </div>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
 
      </div>

    </div>
 

    <!-- Modal -->
      <div id="modal_comentarios" class="modal fade" role="dialog" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>


 </main>


  <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            },
          "order": [[ 4, "desc" ]]  
        });
   
  });
  
  </script>




</body>
</html>
