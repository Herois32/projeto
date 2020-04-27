       <h6 class="border-bottom border-gray pb-2 mb-0">Relatório Analítico</h6>
      </br>

<fieldset class="fieldset-border">
  <legend class="legend-border">RESUMO</legend>
 Esse relatório é um quantitativo de chamados por Status de cada usuário.
</fieldset>


<form id="form" method="POST">
 
  <div class="form-row align-items-center">
    <div class="col-auto">
<label>Informe o mês:</label>
    </div>
    <div class="col-auto">
    <input type="text" name="dataMes" onKeyPress="MascaraGenerica(this,'DATAMES');" class="form-control col-auto" placeholder="mm/aaaa" id="dataMes" maxlength="7" required  >

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

</main>


</body>

</html>