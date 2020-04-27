      <!-- Body -->

<div class="form-row" align="center">

&#160;&#160;&#160; &#160; &#160;
<h1>Agendar aulas</h1>
</div>

<!-- SE o UPLOAD DO ARQUIVO APRESENTAR ERROR!  -->
    <?php echo (!empty($error) ? $error : '' ); ?>

<!-- ESSA DIV É AVISO DO O AGENDAMENTO JÁ ESTIVER PROGRAMADO!  -->
    <div align="center" id="message"></div>
<!-- ### -->


<div class="form-row">

<div class="col-md-2">


</div>

<div class="col-md-8">
<div class="form-row">

<p>&#160;</p>

</div>
<!--action="<?php echo BASE_URL; ?>aulas/montarAulas"-->
<form id="form_ulpoad" method="POST" enctype="multipart/form-data">

<div class="form-row">

Titulo aula:&#160;&#160;&#160;
   

<div class="col-auto" width="30%">
<input type="text" name="tituloAula" class="form-control col-auto" id="tituloAula"  placeholder="Titulo" maxlength="30" required>

</div>
</div >

&#160;

  <div class="form-row align-items-center">
    <div class="col-auto">
<label>Data inicial:</label>
    </div>
    <div class="col-auto">
    <input type="date" name="dataInicio" class="form-control col-auto" id="dataInicio" style="width:175px"  onkeypress="return somenteNumeros(event)"  placeholder="dd/mm/aaaa" maxlength="11" required>
    </div>

    <div class="col-auto" width="30%" >
<label>Data final:</label>
    </div>
 <div class="col-auto">
    <input type="date" name="dataFim" class="form-control col-auto" id="dataFim" style="width:175px"  onkeypress="return somenteNumeros(event)"  placeholder="dd/mm/aaaa" maxlength="11" required>  
    </div>
</div>

&#160;

<div class="form-row align-items-center">
    <div class="col-auto">
<label>Hora inicio:</label>
    </div>
    <div class="col-auto">
    <input type="time" name="horaInicio" class="form-control col-auto" id="horaInicio" OnKeyUp="Mascara_Hora(this.value)" placeholder="00:00"  maxlength="5" required>
    </div>

    <div class="col-auto" width="30%" >
<label>Hora fim:&#160;&#160;&#160;</label>
    </div>
 <div class="col-auto">
    <input type="time" name="horaFim" class="form-control col-auto" id="horaFim" OnKeyUp="Mascara_Hora(this.value)"  placeholder="00:00" maxlength="5" required>  
    </div>
</div>


<div class="form-row">

<p>&#160;</p>

</div>


<div class="form-row">
    <div class="form-group">
          <label>Anexar video: &#160;&#160;</label>
          <input type="file" name='arquivo' id="exampleFormControlFile1" required>
    </div> 

 </div> 


 <div class="form-row" >
<div align="right">
 Extensões aceitas .Mkv, .Mp4, .Rmvb,
</div>
</div>


<div class="form-row">

<p>&#160;</p>

</div>


 <div class="form-row">
          <button type="submit" class="btn btn-outline-primary">Salvar</button>

 </div> 
        </form>


 </div> 

</div>
