<div class="form-row" align="center">



&#160;&#160;&#160;&#160;&#160;

&#160;&#160;&#160;&#160;&#160;

<h1>Editar Mensagens</h1>

</div>





<form action="<?php echo BASE_URL; ?>mensagem/atualizar" method="POST">

<?php foreach ($info as $key): ?>

<div class="container" style="margin: 20px">

  <div class="row">

    <div class="col-lg-6">

      <input type="hidden" name="id" value="<?php echo $key['ms_id']; ?>">

     <label>Título:</label>

      <input type="text" name="titulo" class="form-control" id="titulo" style="margin-bottom: 10px" value="<?php echo $key['ms_titulo']; ?>">

    </div>

   </div> 

    <div class="row"> 

    <div class="col-lg-6">

     <label>Mensagem:</label>

   <textarea class="form-control " cols="100" rows="7" name="mensagem" id="mensagem" maxlength="350"><?php echo $key['ms_descricao']; ?></textarea>

    </div>

  </div>

  <div class="row">

    <div class="col-lg-3">

     <label>Data:</label>

      <input type="text" name="data" class="form-control" id="data" style="margin-bottom: 10px" value="<?php echo (date("d/m/Y", strtotime($key['ms_data']))); ?>" onKeyPress="MascaraGenerica(this,'DATA');">

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

