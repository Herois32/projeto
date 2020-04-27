<h6 class="border-bottom border-gray pb-2 mb-0">Relatório Quantitativo Mês</h6>
      </br>


<fieldset class="fieldset-border">
  <legend class="legend-border">RESUMO</legend>
  Esse relatório é um quantitativo total de Chamados: Abertos, em andamento, fechado e reaberto em um período.
</fieldset>

  <div class="form-group col-md-8">
  <p> &#160; </p>
  </div>

<form name="form_relatorio_mes" id="form_relatorio_mes" method="POST">
 
<div class="form-row ">
<label> - Informe o Periodo:</label>

</div>

<br>

  <div class="form-row align-items-center">
    <div class="col-auto" width="30%">
<label>Data Inicial:</label>
    </div>
    <div class="col-auto">
    <input type="text" name="dataInicio" class="form-control col-auto" id="dataInicio" onKeyPress="MascaraGenerica(this,'DATA');" placeholder="dd/mm/aaaa" maxlength="11" required>
    </div>


 <div class="form-group" style="margin:10px" >
  <p> &#160; </p>
  </div>


    <div class="col-auto" width="30%" >
<label>Data FInal:</label>
    </div>
 <div class="col-auto">
    <input type="text" name="dataFim" class="form-control col-auto" id="dataFim" onKeyPress="MascaraGenerica(this,'DATA');" placeholder="dd/mm/aaaa" maxlength="11" required>  
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
<div class="form-group col-md-8">
  <p></p>
  </div>
    </div>
  
</form>

<div class="borda"></div>



<div class="form-group col-md-12">
  <p class="border-bottom border-gray pb-2 mb-"> <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Voltar</a></p>
  </div>

</body>

</html>