      <!-- Begin Page Content -->
        <div class="container-fluid">

<!--<div id="resultado"></div>-->

<style>
video {
  width: 50%;
  height: auto;
}
</style>


          <!-- Page Heading -->
 <h1 class="h3 mb-4 text-gray-800">Lista de Mensagens</h1>

<!-- 21:9 aspect ratio -->
<div align="center" >

  <!-- SE alert VINHER PREENCHIDO  -->
  <?php echo (!empty($alert) ? $alert : '' ); ?> 

   <!-- ALERTA PARA AVISAR QUE FOI DELETADO COM SUCESSO  -->
  <?php echo (!empty($delet) ? $delet : '' ); ?> 


<div class="form-row">

    <table  class="table table-bordered" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th scope="col">Identificador</th>
          <th scope="col">Titulo</th>
          <th scope="col">Mensagem</th>
          <th scope="col">Data</th>
          <th scope="col">Editar</th>
          <th scope="col">Deletar</th>

        </tr>
      </thead>
      <tbody align="center">

        <?php foreach($msg as $key): ?>

         <tr>
          <td><?php echo $key['ms_id']; ?></td>        
          <td><?php echo $key['ms_titulo']; ?></td>
          <td><?php echo $key['ms_descricao']; ?></td>
          <td><?php echo (date("d/m/Y", strtotime($key['ms_data']))); ?></td>
          <td><a href="<?php echo BASE_URL; ?>mensagem/editarMsg/<?php echo $key['ms_id']; ?>"><img src="<?php echo BASE_URL; ?>assets/images/editarMsg.svg" class="img-responsive" title ="Editar Mensagem" alt="Editar Mensagem" width="25" height="25"></a></td>
          <td><a href="<?php echo BASE_URL; ?>mensagem/deletarMsg/<?php echo $key['ms_id']; ?>"><img src="<?php echo BASE_URL; ?>assets/images/deletarMsg.svg" class="img-responsive" title ="Deletar Mensagem" alt="Deletar Mensagem" width="25" height="25"></a></td>    
        </tr>
       <?php endforeach; ?>
      </tbody>
     
    </table> 



 
          

</div>
</div>
 
</div>

 <!-- /.container-fluid -->


               <!-- Modal -->
      <div id="modal_excluir_admin" class="modal fade" role="dialog" >
        <div class="modal-dialog"  >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div> 

