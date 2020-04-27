       <h6 class="border-bottom border-gray pb-2 mb-0">Relatório Quantitativo Dias</h6>
      </br>

<fieldset class="fieldset-border">
  <legend class="legend-border">RESUMO</legend>
  Esse relatório é um quantitativo de total de dias no qual se levou entre o chamado na fila de atendimento até a sua conclusão classificado por categorias.
</fieldset>


<!-- <form action="<?php echo BASE_URL; ?>relatorios" method="POST">-->
<form name="form_relat_dia" id="form_relat_dia" method="POST">
<div class="form-row">

   <div class="form-group col-md-8">
 	<p></p>
  </div>
  <div class="form-row align-items-center">
  	<div class="col-auto">
<label>Selecione a categoria</label>
    </div>
    <div class="col-auto" >
      <select class="form-control" name="inputCategoria" id="inputCategoria" required>
  	  <option value="" >Selecione...</option>
  	  <?php foreach($catego as $key): ?> 
  	  <option required value="<?php echo $key['cg_categoria']; ?>"><?php echo $key['cg_categoria']; ?></option>
  	  <?php endforeach; ?>
	  </select>
    </div>
    <div class="col-auto">

      <button type="submit" class="btn btn-primary ">Consultar</button>

    </div>
<div class="form-group col-md-8">
 	<p></p>
  </div>
  </div>
    </div>
</form>
</br>
<div class="borda"></div>
 
<?php if(empty($info)): ?>
<p class="border-bottom border-gray pb-2 mb-12"> <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Voltar</a></p>
 <?php endif; ?> 



</main>


</script>

</body>

</html>