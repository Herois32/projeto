<div class="form-row" align="center">

&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
<h1>Editar Dados</h1>
</div>


<form method="POST" >

<div class="container" style="margin: 20px">
  <div class="row">

<?php foreach($editar as $key): ?>

    <div class="col-lg-5">
     <label>Nome:</label>
     <input type="text" name="nome" class="form-control" id="nome" value="<?php echo $key['usr_nome']; ?>" style="margin-bottom: 10px" readonly required>
    </div>
    
    <div class="col-lg-2">
     <label>CPF:</label>
      <input type="text" name="cpf" class="form-control" id="CPF" onKeyPress="MascaraGenerica(this, 'CPF');" value="<?php echo $key['usr_cpf']; ?>" style="margin-bottom: 10px" readonly required>
    </div>
  </div>

<div class="row">
    <div class="col-lg-5">
     <label for="inputCNPJ">E-mail:</label>
      <input type="email" name ="email" class="form-control" id="email" value="<?php echo $key['usr_email']; ?>" style="margin-bottom: 10px" readonly required>
    </div>
  </div>

<div class="row">
    <div class="col-md-2">
     <label>telefone:</label>
      <input type="text" name ="telefone" class="form-control" id="telefone" onKeyPress="MascaraGenerica(this, 'TELEFONE');" value="<?php echo $key['usr_telefone']; ?>" required>
    </div>

  </div>

<?php endforeach; ?>

<div class="form-row ">

<p>&#160;</p>

</div>



 <div class="form-row">
    <input type="submit" value="Atualizar" class="btn btn-primary">
</form>
</div>
</div>



















