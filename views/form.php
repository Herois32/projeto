<?php $id = $_GET['id']; ?>
<form method="POST" id="form">
	<tr>
	<input type="text" name="id" value="<?php echo $id; ?>">
	</tr>
	<tr>
		<td><textarea cols="25" name="comentarios" id="comentarios"></textarea></td>
	</tr>
	<input type="submit" value="Enviar">
</form>