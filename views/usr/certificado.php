      <div class="container">
        <div align="center">
         <form class="form-horizontal" action="gerar_certificado/gerador.php" method="post"  id="contact_form">
            <fieldset>
               <center>
                  <h1>Gere seu certificado online</h1>
               </center>
               <p>&nbsp;</p>

                <img src="<?php echo BASE_URL; ?>gerar_certificado/certificado.jpg" alt="Certificado" width="400" height="270">
                
               <?php foreach($info as $key): ?>

                        <input  name="nome" placeholder="Nome completo" class="form-control"  type="hidden" value="<?php echo $key['usr_nome']; ?>">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    
                        <input name="curso" placeholder="curso" class="form-control"  type="hidden" value="<?php echo $key['al_curso']; ?>">

        
          <?php endforeach; ?>

      <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
      <button type="submit" class="btn btn-primary">Gerar Certificado</button>
      </div>
      </div>
      </fieldset>
      </form>

      </div>

      </div>
