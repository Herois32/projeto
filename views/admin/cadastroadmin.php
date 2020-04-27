<div class="form-row" align="center">

&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
<h1>Cadastro usuário Admin</h1>
</div>

<!-- ALERT QUANDO O CADASTRAMENTO DA ERROR  -->
  <?php echo (!empty($alert) ? $alert : '' ); ?> 



<form action="<?php echo BASE_URL; ?>usuario/cadastrarUsuario" method="POST">

<div class="container" style="margin: 20px">
  <div class="row">
    <div class="col-lg-4">
     <label>Nome:</label>
      <input type="text" name="nome" class="form-control" id="nome" style="margin-bottom: 10px" required>
    </div>
    
    <div class="col-lg-2">
     <label>CPF:</label>
      <input type="text" name="cpf" class="form-control" id="CPF" onKeyPress="MascaraGenerica(this, 'CPF');" style="margin-bottom: 10px" required>
    </div>
  </div>

<div class="row">
    <div class="col-lg-4">
     <label for="inputCNPJ">E-mail:</label>
      <input type="email" name ="email" class="form-control" id="email" style="margin-bottom: 10px" required>
    </div>
    <div class="col-lg-2">
     <label for="inputRazao">Senha:</label>
      <input type="password" name ="senha" class="form-control" id="senha" style="margin-bottom: 10px" required>
    </div>
  </div>

<div class="row">
  <div class="col-lg-2">
     <label for="inputCNPJ">Sexo:</label>
      <select name="sexo" id="inputSexo" class="form-control" style="margin-bottom: 10px" required>
        <option value="">Selecione...</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option> 
        
       </select>
    </div>

    <div class="col-md-2">
     <label>telefone:</label>
      <input type="text" name ="telefone" class="form-control" id="telefone" onKeyPress="MascaraGenerica(this, 'TELEFONE');" required>
    </div>

  </div>



<div class="form-row ">

<p>&#160;</p>

</div>



 <div class="form-row">
    <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>
</div>
</div>



















