      <div id="atualizar_comentarios">
        <?php if(!empty($listar)): ?>
        <?php foreach($listar as $value): ?> 
        <div class="media text-muted pt-3">
      <?php if($value['cm_idRoles'] == $_SESSION['cIdRoles'] ): ?>          
          <img src="https://cdn4.iconfinder.com/data/icons/gray-toolbar-8/512/xxx034-512.png"  width="35" height="35" alt="" class="mr-2 rounded">
       <?php endif; ?>


       <?php if($value['cm_idRoles'] == 1 ): ?>
          <img src="https://image.winudf.com/v2/image1/Y29tLnByb2R1Y3Rpb24uYWNob3VyX2FyLmdzaG1vYmlsZWhlbHBkZXNrX2ljb25fMTU1Mzk4NTI4NV8wMzc/icon.png?w=170&fakeurl=1"  width="45" height="45" alt="" class="mr-2 rounded">
      <?php endif; ?>

          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <form >
            <div class="d-flex justify-content-between align-items-center w-100">
              
              <strong class="text-gray-dark"><?php echo $value['cm_nome']; ?></strong>
              
              <!--<a href="javascript:;" onclick="enviarCometarios()" >Comentar</a>-->
            </div>
            <span class="d-block"><?php echo $value['cm_data']; ?></span>
            <?php echo $value['cm_cometarios']; ?>
            
          </div>
          </form>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  

      <small class="d-block text-right mt-3">

           <form method="POST" id="comentarios" align="left">
           <tr>
            <h6>Novo Comentário:</h6>
            </br> 
           </tr>
           <tr>
            <input type="hidden" name="id" value="<?php echo $_SESSION['cId']; ?>">
             <td>
               <textarea rows="5"  class="form-control col-md-6"  name="comentarios" id="comentarios" value="" required></textarea>
             </td>
           </br>            
             <input type="submit" value="Comentar" class="btn btn-primary">
           </tr>

         </form>
        </small>
        </br>

 
    </div>

    </div>
    