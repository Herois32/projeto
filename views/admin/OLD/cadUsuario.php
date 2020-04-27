       <h6 class="border-bottom border-gray pb-2 mb-0">Cadastrar Usuário</h6>
       <!-- SE O USUARIO ADICINADO COM SUCESSO!  -->
       <?php echo (!empty($alert) ? $alert : '' ); ?>

       <!-- MENSAGEM DE ERROR SE O USUÁRIO JA FOR CADASTRADO  -->
       <?php echo (!empty($error) ? $error : '' ); ?>       

        <br/>

<form action="<?php echo BASE_URL; ?>usuario/add" method="POST">

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail">Email:</label>
      <input type="email" name="email" class="form-control" id="inputEmail" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Senha:</label>
      <input type="password" name="senha" class="form-control" id="inputPassword" required>
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputNome">Nome:</label>
      <input type="text" name ="nome" class="form-control" id="inputNome" placeholder="Nome e Sobrenome" required>
    </div>
         <div class="form-group col-md-4">
              <label for="inputEmpresa">Empresa:</label>
              <select id="inputEmpresa" class="form-control" name='empresa' required> 
                <option value="">Selecione...</option>
               <?php foreach($listar as $item): ?>                 
                <option value="<?php echo $item['ep_id']; ?>"><?php echo $item['ep_razao_social']; ?></option>
               <?php endforeach; ?>
              </select>
            </div>
  </div>
      

<div class="form-row">

         <div class="form-group col-md-4">
              <label for="inputTipoconta">Tipo de Conta:</label>
              <select id="inputTipoconta" class="form-control" name='tipoconta' required> 
                <option value="">Selecione...</option>
               <?php foreach($perfil as $key): ?>                 
                <option value="<?php echo $key['rl_id']; ?>"><?php echo $key['rl_perfil']; ?></option>
               <?php endforeach; ?>
              </select>
            </div>
  </div>


  
  <button type="submit" class="btn btn-primary">Salvar</button>

<a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Cancelar</a>


        </form>
      

  </div> 

</main>

</body>

</html>