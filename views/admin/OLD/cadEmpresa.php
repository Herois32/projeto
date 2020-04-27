       <h6 class="border-bottom border-gray pb-2 mb-0">Cadastrar Empresa</h6>
  <!-- ALERT QUANDO O CADASTRAMENTO DA EMPRESA DER TUDO CERTO!  -->
      <?php echo (!empty($alert) ? $alert : '' ); ?>

  <!-- AVISO DE ERROR SE O CADASTRAMENTO DA EMPRESA NÃO DER CERTO!  -->
      <?php echo (!empty($error) ? $error : '' ); ?>      

        <br/>



<form action="<?php echo BASE_URL; ?>empresa/insert" method="POST" name="formCadEmpresa">
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCNPJ">CNPJ:</label>
      <input type="text" name ="cnpj" class="form-control" id="cnpj" onKeyPress="MascaraGenerica(this, 'CNPJ');" required>
    </div>

    <div class="form-group col-md-8">
      <label for="inputRazao">Razão Social:</label>
      <input type="text" name ="razaoSocial" class="form-control" id="inputRazao" required>
    </div>

  </div>

  <div class="form-group">
    <label for="inputAddress">Endereço:</label>
    <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Avenida, Rua" required>
  </div>

      <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade:</label>
      <input type="text" name="cidade" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Estado:</label>
      <select name="estado" id="inputState" class="form-control" required>
        <option value="">Selecione...</option>
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
      <input type="text" name="cep" class="form-control" id="inputZip" onKeyPress="MascaraGenerica(this, 'CEP');" required>
    </div>
 </div>
 
 <div class="form-row">
  <div class="form-group col-md-4" >
    <label for="inputtelefone">Contato:</label>
    <input type="text" name="telefone" class="form-control" id="inputtelefone" placeholder="DDD+Telefone" onKeyPress="MascaraGenerica(this, 'TELEFONE');"  required>
  </div>

    <div class="form-group col-md-8">
      <label for="inputCity">Atividade Econômica:</label>
      <input type="text" name="atividade" class="form-control" id="inputCity" maxlength="50" required>
    </div>
 </div>

  <button type="submit" class="btn btn-primary">Salvar</button>

<a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Cancelar</a>

        
 

        </form>
      
  </div> 

</main>

</body>

</html>