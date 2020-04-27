<div class="form-row" align="center">

&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
<h1>Cadastro de Mensagens</h1>
</div>

<!-- ALERT QUANDO O CADASTRAMENTO DA MENSAGEM DA CERTO  -->
  <?php echo (!empty($alert) ? $alert : '' ); ?> 



<form action="<?php echo BASE_URL; ?>mensagem/cadastroMensagens" method="POST">

<div class="container" style="margin: 20px">
  <div class="row">
    <div class="col-lg-6">
     <label>Título:</label>
      <input type="text" name="titulo" class="form-control" id="titulo" style="margin-bottom: 10px" required>
    </div>
   </div> 
    <div class="row"> 
    <div class="col-lg-6">
     <label>Mensagem:</label>
   <textarea class="form-control " cols="100" rows="7" name="mensagem" id="mensagem" maxlength="350" required></textarea>
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



















