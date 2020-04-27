<style>
video {
  width: 25%;
  height: auto;
}
</style>

<div align="center" >

<?php foreach($dados as $key): ?>

<h3> <?php echo $key['al_curso']; ?>
</br>


<div class="embed-responsive embed-responsive-21by9">
 
<video width="300" controls>
  <source src="arquivos/<?php echo $key['al_arquivos']; ?>" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
</video>


</div>

<?php endforeach; ?>

</br>


 <div class="form-row">
    <form id="modal_video" method="POST">
   <button type="submit" class="btn btn-outline-primary">Fechar</button>
	</form> 
         
</div>




</div>