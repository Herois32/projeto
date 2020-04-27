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
 <h1 class="h3 mb-4 text-gray-800">Agendamento das Aulas</h1>

<!-- 21:9 aspect ratio -->
<div align="center" >

<!-- SE o UPLOAD DO ARQUIVO DER TUDO CERTO!  -->

  <?php echo (!empty($msg) ? $msg : '' ); ?> 

<!-- QUANDO O DITAR FINALIZAR E DER TUDO CERTO!  -->
  <?php echo (!empty($mensagem) ? $mensagem : '' ); ?>    

<div class="form-row">

    <table  class="table table-bordered" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th width="5%" scope="col">View</th>
          <th scope="col">Titulo</th>
          <th scope="col">Dt. Inicio</th> 
          <th scope="col">Dt. Fim</th>
          <th scope="col">Hr. Inicio</th>
          <th scope="col">Hr. Fim</th>       
          <th scope="col">Editar Ag.</th>
          <th scope="col">Deletar Ag.</th>

        </tr>
      </thead>
      <tbody align="center">
<?php if(!empty($dados)): ?>
         <?php foreach($dados as $key): ?>
         <tr>       
          <th scope="row"><a href="javascript:;" onclick="ViewVideo('<?php echo $key['al_id']; ?>')"><img src="<?php echo BASE_URL; ?>assets/images/icovideo.png" class="img-responsive" alt="usuraio" width="25" height="25"></a></th>
          <td><?php echo $key['al_curso']; ?></td>   
          <td><?php echo date("d/m/Y", strtotime($key['al_dataInicio'])); ?></td>
          <td><?php echo date("d/m/Y", strtotime($key['al_dataFim'])); ?></td>
          <td><?php echo $key['al_horaInico']; ?></td>
          <td><?php echo $key['al_horaFim']; ?></td>    
         <td width=" 50" align="center">
          <a href="javascript:;" onclick="editarAgendamento('<?php echo $key['al_id']; ?>')"> <img src="<?php echo BASE_URL; ?>assets/images/iconvideoedit.png" class="img-responsive" title ="Editar agendamento" alt="Editar agendamento" width="25" height="25"> </a>
         </td>
         <td width="50" align="center">
         <a href="javascript:;" onclick="deletarAgendamento('<?php echo $key['al_id']; ?>')"> <img img src="<?php echo BASE_URL; ?>assets/images/iconvideooff.png" class="img-responsive" title ="Desativar agendamento" alt="Desativar"  width="25" height="25">  </a>
         </td>
        </tr>
       <?php endforeach; ?>
 <?php endif; ?>
      </tbody>
     
    </table> 



 
          

</div>
</div>
 
</div>

 <!-- /.container-fluid -->

         <!-- Modal -->
      <div id="modal_editar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modal-body" width >....</div>
          </div>
        </div>
      </div>   


               <!-- Modal -->
      <div id="modal_video" class="modal fade" role="dialog" >
        <div class="modal-dialog"  >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>  