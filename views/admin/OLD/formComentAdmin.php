<?php $id = $_GET['id']; ?>

<form method="POST" id="form">
	<h6>Escreva seu Comentário:</h6>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<textarea class="form-control " cols="70" rows="7" name="comentarios" id="comentarios" maxlength="350" required></textarea>
</br>            
<input type="submit" value="Comentar" class="btn btn-primary">

</form>