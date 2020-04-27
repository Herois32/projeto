
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


<?php foreach($dados as $chave): ?>
 <?php if($chave['al_dataInicio'] == $data_aula): ?> 

          <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Curso: <?php echo $chave['al_curso']; ?></h1>



  <!-- 21:9 aspect ratio -->
  <div align="center" >



  <div class="embed-responsive embed-responsive-21by9">

  <video width="400" controls>
    <source src="../arquivos/<?php echo $chave['al_arquivos']; ?>" type="video/mp4">
    <source src="mov_bbb.ogg" type="video/ogg">
  </video>


  </div>
<?php endif; ?>


<?php endforeach; ?>

<?php if(empty($chave)): ?>
  NENHUM AULA PARA ESSA DATA ESTA PROGRAMADA
 <?php endif; ?> 
</br>

</div>

COMENTÁRIOS

       
        <?php if(!empty($coment)): ?>  
        <?php foreach($coment as $value): ?>
          <div id="atualizar_comentarios"> 
        <div class="media text-muted pt-3"> 
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <form >
            <div class="d-flex justify-content-between align-items-center w-100">  
              <strong class="text-gray-dark">
                <?php if($value['cm_idRoles'] == 1): ?>
                <font style="color: #8B4513"> PROFESSOR: </font><?php echo $value['cm_nome']; ?></strong>  
                <?php endif; ?>  

                 <?php if($value['cm_idRoles'] == 2): ?> 
                <font style="color: #FF4500"> ALUNO: </font><?php echo $value['cm_nome']; ?></strong>
                <?php endif; ?>
              
            </div>
            <span class="d-block"><?php echo (date("d/m/Y H:i:s", strtotime($value['cm_data']))); ?></span>
            <?php echo $value['cm_cometarios']; ?>         
            
          </div>
           

          </form>
        </div>
         <?php endforeach; ?>
          <?php endif; ?>

           

        <small class="d-block text-right mt-3">
         <!-- <a href="javascript:;" onclick="enviarCometarios()">Comentar</a></br>-->
         <form method="POST" id="comentarios" align="left">
           <tr>
            <h6>Novo Comentário:</h6>
            </br> 
           </tr>
           <tr>
            <input type="hidden" name="id" value="<?php echo $_SESSION['cId']; ?>">
             <td>
               <textarea rows="5"  class="form-control col-md-6"  name="comentarios" id="comentarios" maxlength="450"  required></textarea>
             </td>
           </br>            
             <input type="submit" value="Comentar" class="btn btn-primary">
           </tr>

         </form>
        </small>
        </br>

</div>

 <!-- /.container-fluid -->