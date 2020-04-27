<?php  $id = $info   ?>
<h3>Trocar Senha</h3>

<form method="POST" id="form">
<div class="form-row ">
&#160;&#160;&#160;&#160;&#160;&#160;  
</div>

	
   <div class="form-inline">
	<tr>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	</tr>
	<tr>
		<label>Digite a nova senha:&#160;&#160;</label>
		<td><input class="form-control" type="password" name="senha"></td>
	</tr> &#160;&#160;
	<input type="submit" class="btn btn-primary" value="Trocar Senha">
   </div>
</form>
