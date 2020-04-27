      <!-- Begin Page Content -->
        <div class="container-fluid">


<style>
video {
  width: 50%;
  height: auto;
}
</style>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Curso: Conhecer Mais</h1>

<!-- 21:9 aspect ratio -->
<div align="center" >

<div class="embed-responsive embed-responsive-21by9">

<video width="400" controls>
  <source src="../arquivos/8dabd9b8f20bd459d75847a03a379feb.mp4" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
</video>


</div>
</br>

</div>

COMENTÁRIOS


        <div id="atualizar_comentarios">
        <?php if(!empty($coment)): ?>  
        <?php foreach($coment as $value): ?>  
        <div class="media text-muted pt-3"> 
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <form >
            <div class="d-flex justify-content-between align-items-center w-100">  
              <strong class="text-gray-dark"><?php echo $value['cm_nome']; ?></strong>
              
              <a href="javascript:;" onclick="enviarCometarios()" >Responder</a> 
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