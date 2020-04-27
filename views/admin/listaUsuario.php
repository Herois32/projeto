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
 <h1 class="h3 mb-4 text-gray-800">Lista de Usuários Administradores do Sistema</h1>

<!-- 21:9 aspect ratio -->
<div align="center" >

  <!-- ALERT QUANDO O CADASTRAMENTO DA CERTO  -->
  <?php echo (!empty($alert) ? $alert : '' ); ?> 

    <!-- ALERT QUANDO A EDIÇÃO DER CERTO  -->
  <?php echo (!empty($aviso) ? $aviso : '' ); ?> 


      <!-- ALERT QUANDO O DELETE DER CERTO -->
  <?php echo (!empty($alertDel) ? $alertDel : '' ); ?> 

<div class="form-row">

    <table  class="table table-bordered" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th width="5%" scope="col"></th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ultimo Acesso</th>
          <th scope="col">Editar Usr.</th>
          <th scope="col">Deletar Usr.</th>

        </tr>
      </thead>
      <tbody align="center">

        <?php foreach($infor as $key): ?>

         <tr>       
          <th scope="row"><img src="<?php echo BASE_URL; ?>assets/images/iconuser.jpg" class="img-responsive" alt="usuraio" width="25" height="25"></th>
          <td><?php echo $key['usr_nome']; ?></td>   
          <td><?php echo $key['usr_email']; ?></td>
          <td><?php echo (date("d/m/Y H:i:s", strtotime($key['usr_ultimo_acesso']))); ?></td>
           
         <td width=" 50" align="center">
          <a href="<?php echo BASE_URL; ?>usuario/editarUsuario/<?php echo $key['usr_id']; ?>"> <img src="<?php echo BASE_URL; ?>assets/images/iconuseredit.png" class="img-responsive" title ="Editar Usuario" alt="Editar agendamento" width="25" height="25"> </a>
         </td>
         <td width="50" align="center">
         <a href="javascript:;" onclick="deletarAdmin('<?php echo $key['usr_id']; ?>')"> <img img src="<?php echo BASE_URL; ?>assets/images/iconuserdelete.png" class="img-responsive" title ="Deletar" alt="Deletar"  width="25" height="25">  </a>
         </td>
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

