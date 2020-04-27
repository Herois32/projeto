 
      <!-- Begin Page Content -->
        <div class="container-fluid">


<style>
video {
  width: 50%;
  height: auto;
}
</style>

<!-- AQUI PEGO O HORARIO ATUAL PARA FAZER A COMPARAÇÃO  -->
<?php $data_aula = date('Y-m-d'); ?>

<!-- 21:9 aspect ratio -->
  <div align="center" >


<?php foreach($dados as $chave): ?>
 <?php if($chave['al_dataInicio'] == $data_aula){ ?> 

          <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Curso: <?php echo $chave['al_curso']; ?></h1>




  <div class="embed-responsive embed-responsive-21by9">

  <video width="400" controls>
    <source src="../arquivos/<?php echo $chave['al_arquivos']; ?>" type="video/mp4">
    <source src="mov_bbb.ogg" type="video/ogg">
  </video>


  </div>
<?php }else if($chave['al_dataInicio'] == $data_aula){ ?>

 <h1 class="h3 mb-4 text-gray-800">NENHUMA AULA PROGRAMADA PRA HOJE</h1>


<?php } ?>
<?php endforeach; ?>

</br>

</div>

COMENTÁRIOS E DÚVIDAS


        <div id="atualizar_comentarios">
        <?php if(!empty($coment)): ?>  
        <?php foreach($coment as $value): ?>  
        <div class="media text-muted pt-3"> 
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <form >
            <div class="d-flex justify-content-between align-items-center w-100">  
              <strong class="text-gray-dark">
                <?php if($value['cm_idRoles'] == 1): ?>
                <font style="color: #8B4513"> PROFESSOR: </font> <?php echo $value['cm_nome']; ?></strong>
              <?php endif; ?>
                <?php if($value['cm_idRoles'] == 2): ?>
                <font style="color: #FF6347"> ALUNO: </font> <?php echo $value['cm_nome']; ?></strong>
              <?php endif; ?>

              
              <?php if($value['cm_idRoles'] == 2): ?>
              <a href="javascript:;" onclick="enviarCometarios('<?php echo $value['cm_idUsr']; ?>')" >Responder</a> 
              <?php endif; ?>

            </div>
            <span class="d-block"><?php echo (date("d/m/Y H:i:s", strtotime($value['cm_data']))); ?></span>
            <?php echo $value['cm_cometarios']; ?>         
            
          </div>
           

          </form>
        </div>
         <?php endforeach; ?>
          <?php endif; ?>

 

    <!-- Modal -->
      <div id="modal_comentarios" class="modal fade" role="dialog" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>


</div>
</div>

 <!-- /.container-fluid -->