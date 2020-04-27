<form method="POST" id="form_certificado">
  <div class="form-group">
    <label for="exampleFormControlFile1">Anexe o certificado</label>
    <input type="hidden" name="id" value="<?php print_r($id); ?>">
    <input type="file" name="arquivo" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <input type="submit" class="btn btn-primary" value="Enviar Anexo">
</form>