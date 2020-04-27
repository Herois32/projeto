       <h6 class="border-bottom border-gray pb-2 mb-0">Editar Empresa</h6>
       <?php
        if(!empty($alert) && $true == true): ?>
          <div class="alert alert-success" role="alert">
          <?php echo $alert; ?>
          </div>
        <?php endif; ?>

        <?php if(!empty($error) && $falso == false): ?>
        <div class="alert alert-warning" role="alert">
         <?php echo $error; ?>
        </div>
        <?php endif; ?>
        <br/>

<form method="POST">
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCNPJ">CNPJ:</label>
      <input type="text" name ='cnpj' class="form-control" id="inputCNPJ" placeholder="CNPJ" value="<?php echo $listar['ep_cnpj']; ?>" readonly>
    </div>

    <div class="form-group col-md-8">
      <label for="inputRazao">Razão Social:</label>
      <input type="text" name ="razaoSocial" class="form-control" id="inputRazao" placeholder="Razão Social" value="<?php echo $listar['ep_razao_social']; ?>" readonly>
    </div>

  </div>

  <div class="form-group">
    <label for="inputAddress">Endereço:</label>
    <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="endereco" value="<?php echo $listar['ep_endereco']; ?>" required>
  </div>


      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade:</label>
      <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Cidade" value="<?php echo $listar['ep_cidadade']; ?>" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado:</label>
      <select name="estado" id="inputState" class="form-control" required>
        <option value="<?php echo $listar['ep_estado']; ?>"><?php echo $listar['ep_estado']; ?></option>
        <option value="acre">Acre</option>
        <option value="amapa">Amapá</option>
        <option value="amazonas">Amazonas</option> 
        <option value="bahia">Bahia</option>
        <option value="ceara">Ceará</option>
        <option value="distrito federal">Distrito Federal</option> 
        <option value="espirito santo">Espírito Santo</option>
        <option value="goias">Goiás</option>
        <option value="maranhao">Maranhão</option>
        <option value="mato grosso">Mato Grosso</option> 
        <option value="mato grosso do sul">Mato Grosso do Sul</option>
        <option value="minas gerais">Minas Gerais</option>
        <option value="para">Pará</option>
        <option value="paraiba">Paraíba</option> 
        <option value="parana">Paraná</option>
        <option value="pernambuco">Pernambuco</option>
        <option value="piaui">Piauí</option>
        <option value="rio de janeiro">Rio de Janeiro</option> 
        <option value="rio grande do norte">Rio Grande do Norte</option>
        <option value="rio grande do sul">Rio Grande do Sul</option>
        <option value="rondonia">Rondônia</option>
        <option value="roraima">Roraima</option> 
        <option value="santa catarina">Santa Catarina</option>
        <option value="sao paulo">São Paulo</option>
        <option value="sergipe">Sergipe</option>
        <option value="tocantins">Tocantins</option>  
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">CEP:</label>
      <input type="text" name="cep" class="form-control" id="inputZip" placeholder="Cep" value="<?php echo $listar['ep_cep']; ?>" onkeypress="MascaraCep(this)" maxlength="10" onBlur="ValidaCep(formCadEmpresa.cep);" required>
    </div>
 </div>
 
 <div class="form-row">
  <div class="form-group col-md-4" >
    <label for="inputtelefone">Contato:</label>
    <input type="text" name="telefone" class="form-control" id="inputtelefone" placeholder="DDD+Telefone" value="<?php echo $listar['ep_telefone']; ?>" onKeyPress="MascaraGenerica(this, 'TELEFONE');"  required required>
  </div>

    <div class="form-group col-md-8">
      <label for="inputCity">Atividade Econômica:</label>
      <input type="text" name="atividade" class="form-control" id="inputCity" placeholder="Atividade" value="<?php echo $listar['ep_atividade']; ?>" required>
    </div>

   <div class="form-group col-md-6">
      <label for="inputCity">Cidade:</label>
      <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Cidade" value="<?php echo $listar['ep_cidadade']; ?>" required>
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputState">Situção:</label>
      <select name="status" id="inputState" class="form-control" required>
        <option value="<?php echo $listar['ep_status']; ?>"><?php echo $listar['ep_status']; ?></option>
        <option value="<?php echo ($listar['ep_status'] == 'Ativo' ? 'Desativado' : 'Ativo'); ?>"><?echo ($listar['ep_status'] == 'Ativo' ? 'Desativado' : 'Ativo') ?></option>
      </select>
    </div>

 </div>

   <button type="submit" class="btn btn-primary">Alterar</button>

 <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Cancelar</a>
       
        </form>
      
  </div> 

</main>

</body>

</html>