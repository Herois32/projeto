



<h1>CHECKOUT TRANSPARENTE - PagSeguro</h1>

&#160;
<div class="row">
<div class="col-1">

     <p>&#160;</p>

    </div>


<form method="POST">
<div class="form-inline">
<div class="form-group row">
<strong>Nome:</strong>

<input  type="text" name="name" value="George Cruz dos Santos" class="form-control col-auto" size="30" style="margin-left: 23px"><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>CPF:</strong>

<input type="text" name="cpf" value="01115110543" class="form-control col-auto" style="margin-left: 37px"><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>E-mail:</strong>

<input type="text" name="email" size="35" value="c87318876059697676855@sandbox.pagseguro.com.br" class="form-control col-auto" style="margin-left: 20px"><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Senha:</strong>

<input type="password" name="senha" value="kg8mfxPbXhHUpRx1" class="form-control col-auto" style="margin-left: 23px"><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Valor do Curso:</strong>

<input type="text" name="valor_curso" value="1000" class="form-control col-auto" style="margin-left: 10px"><br/><br/><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<h3 align="left">Informação de Pagamento</h3>

</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Titular do Cartão:</strong>

<input type="text" name="cartao_titular" value="George Cruz dos Santos" class="form-control col-auto" style="margin-left: 40px" ><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>CPF titular do cartão:</strong>

<input type="text" name="cartao_cpf" value="01115110543" class="form-control col-auto" style="margin-left: 12px" ><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Número do cartão:</strong>

<input type="text" name="cartao_numero" class="form-control col-auto" style="margin-left: 33px" ><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Código de Segurança:</strong>

<input type="text" name="cod_seguranca" value="123" class="form-control col-auto" style="margin-left: 11px" ><br/><br/>
</div>
</div>

<div class="form-inline">
<div class="form-group row">
<strong>Data Validade:</strong>

<select name="cartao_mes" class="form-control" style="margin-left: 65px" >

	<?php for($q=1;$q<=12;$q++):?>

		<option><?php echo ($q<10)?'0'.$q:$q ?></option>

	<?php  endfor; ?>	

</select>


<select name="cartao_ano" class="form-control" style="margin-left: 10px">

	<?php $ano = intval(date('Y')); ?>

	<?php for($q=$ano;$q<=($ano+20);$q++):?>

		<option><?php echo $q; ?></option>

	<?php  endfor; ?>	



</select>

</div>
</div>




<div class="form-inline">
<div class="form-group row">

<strong>Parcelas:</strong>

<select name="parc" class="form-control" style="margin-left: 108px" ></select><br/><br/>

</div>
</div>

 <p>&#160;</p>

<div class="form-inline">
<div class="form-group row">
<button class="button efetuarInscricao btn btn-primary" >Finalizar inscrição</button>
</div>
</div>

</form>

</div>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/psckttransparente.js"></script>

<script type="text/javascript">

	PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode; ?>");

</script>

<script type="text/javascript">

  PagSeguroDirectPayment.getSenderHash();

</script>



