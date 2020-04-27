        <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

 
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

