

      <div class="modal-body">
        Deseja realmente excluír esse usuário ?
      </div>
<form id="deletarAdmin" method="POST">
	<input type="hidden" name="id" value="<?php print_r($id); ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">SIM</button>
      </div>
</form>