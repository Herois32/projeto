<h6 class="border-bottom border-gray pb-2 mb-0">Editar Usuário</h6>

<form method="POST" >
  <div class="form-row">
    <input type="hidden" name="id" value="<?php echo $usr['usr_id']; ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail">Email:</label>
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-mail" value="<?php echo $usr['usr_email']; ?>" readonly>
    </div>

  </div>

<div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputNome">Nome:</label>
      <input type="text" name ="nome" class="form-control" id="inputNome" placeholder="Nome e Sobrenome" value="<?php echo $usr['usr_nome']; ?>" required >
    </div>

  </div>

  <div class="form-group col-md-4">
      <label for="inputState">Situção:</label>
      <select name="status" id="inputState" class="form-control">
        <option value="<?php echo $usr['usr_status']; ?>"><?php echo $usr['usr_status']; ?></option>
        <option value="<?php echo ($usr['usr_status'] == "Ativo" ? 'Desativado' : "Ativo"); ?>"><?php echo ($usr['usr_status'] == "Ativo" ? 'Desativado' : "Ativo") ?></option>
      </select>
    </div>

  </div>

          <button type="submit" class="btn btn-primary">Alterar</button>

            <a href="<?php echo BASE_URL; ?>usuario/getUsuarios"><span class="btn btn-secondary" role="button">Cancelar</a>

        </form>
      

  </div> 

</main>

</body>

</html>