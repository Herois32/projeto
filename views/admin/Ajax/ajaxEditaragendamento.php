<div class="form-row">
<div class="col-md-12" align="center">

<h1 >Editar agendamento</h1>
</div>
</div>

<div class="form-row">

<p>&#160;</p>

</div>

<form id="form_editar" method="POST">
<div class="col-md-12">
<?php foreach($result as $key): ?>
	<input type="hidden" name="id" value="<?php echo $key['al_id']; ?>">

 <div class="form-row align-items-center">
    <div class="col-auto">
<label>Data inicial:</label>
    </div>
    <div class="col-auto">
    <input type="text" name="dataInicio" class="form-control col-auto"  style="width:175px"  id="dataInicio" value="<?php echo (date("d/m/Y", strtotime($key['al_dataInicio']))); ?>" onKeyPress="MascaraGenerica(this,'DATA');" maxlength="11" required>
    </div>

    <div class="col-auto" width="30%" >
<label>Data final:</label>
    </div>
 <div class="col-auto">
    <input type="text" name="dataFim" class="form-control col-auto" style="width:175px" id="dataFim" value="<?php echo (date("d/m/Y", strtotime($key['al_dataFim']))); ?>" onKeyPress="MascaraGenerica(this,'DATA');" maxlength="11" required>  
    </div>
</div>

&#160;


<div class="form-row align-items-center">
    <div class="col-auto">
<label>Hora inicio:</label>
    </div>
    <div class="col-auto">
    <input type="time" name="horaInicio" class="form-control col-auto" size="10"  id="horaInicio" value="<?php echo $key['al_horaInico']; ?>"  maxlength="5" required>
    </div>

    <div class="col-auto" width="30%" >
<label>Hora fim:&#160;&#160;&#160;</label>
    </div>
 <div class="col-auto">
    <input type="time" name="horaFim" class="form-control col-auto" size="10"  id="horaFim" value="<?php echo $key['al_horaFim']; ?>" maxlength="5" required>  
    </div>
</div>


<div class="form-row">

<p>&#160;</p>

</div>

<?php endforeach; ?>
 <div class="form-row">
          <button type="submit" class="btn btn-outline-primary">Salvar</button>
          &#160;&#160;&#160;&#160;&#160;&#160;
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

 </div> 

</div> 


</form>