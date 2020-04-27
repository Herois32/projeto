    <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

  
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
            <form method="POST" >
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