<?php if(!empty($info)): ?>


<div class="form-row">

<table class="table text-danger">
  <thead>
    <tr>
      <th scope="col">
    <div align="center" class="col-md-8" >
        <b>Qtd de Chamados Abertos</b></th>
    </div>
      <th scope="col">
<div align="center">
  <b color="red"> Qtd de Chamados Fechados</b>

</div>
      </th>
      </tr>
  </thead>
  </table>
</div>


</br>


<div class="form-row">
<table class="table col-md-5">

  <tbody>
<?php 
if(!empty($info)):
foreach($info as $key): 
  ?>
    <tr>

      <th width="30%" scope="col"><?php echo $key['usr_nome']; ?></th>

      <td width="20%" scope="col"><?php echo $key['ch_status']; ?></td>

      <td width="5%" scope="col"><?php echo $key['total']; ?></td>

      </tr>
<?php endforeach; ?>
<?php endif; ?>
   </tbody>

</table>




 <div class="form-group col-md-2">
  <p> &#160; </p>
  </div>


<table class="table col-md-5">

  <tbody>
<?php 
if(!empty($infoFechado)):
foreach($infoFechado as $fechado): 
  ?>
    <tr>

      <th width="30%" scope="col"><?php echo $fechado['usr_nome']; ?></th>

      <td width="20%" scope="col"><?php echo $fechado['ch_status']; ?></td>

      <td width="5%" scope="col"><?php echo $fechado['total']; ?></td>

      </tr>
<?php endforeach; ?>
<?php endif; ?>
   </tbody>

</table>

</div>






 <div class="form-group col-md-2">
  <p> &#160; </p>
  </div>


<table class="table text-danger">
  <thead>
    <tr>
      <th sc1ope="col" >
   <div align="center" class="col-md-8" >
        <b>Qtd de Chamados Em andamento</b>
  </div>
      </th>
      <th scope="col">
<div align="center"><b>
Qtd de Chamados Reaberto
</b>
</div>
      </th>
      </tr>
  </thead>
  </table>
</div>






 <div class="form-row">
  <p> &#160; </p>
  </div>

<div class="form-row">
<table class="table col-md-5">
 
  <tbody>
 <?php 
 if(!empty($infoAndamento)):
 foreach($infoAndamento as $andamento): 

  ?>
    <tr>

      <th width="30%" scope="col"><?php echo $andamento['usr_nome']; ?></th>

      <td width="20%" scope="col"><?php echo $andamento['ch_status']; ?></td>

      <td width="5%" scope="col"><?php echo $andamento['total']; ?></td>

      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
   </tbody>

</table>




 <div class="form-group col-md-2">
  <p> &#160; </p>
  </div>


<table class="table col-md-5">

  <tbody>
 <?php
 if(!empty($infoReaberto)): 
  foreach($infoReaberto as $reaberto):

   ?>
    <tr>
      <th width="30%" scope="col"><?php echo $reaberto['usr_nome']; ?></th>

      <td width="20%" scope="col"><?php echo $reaberto['ch_status']; ?></td>

      <td width="5%" scope="col"><?php echo $reaberto['total']; ?></td>

      </tr>

<?php endforeach; ?>
<?php endif; ?>

   </tbody>




</table>

</div>
<?php endif; ?>
<?php if(empty($info)): ?>
<div class="alert alert-danger" role="alert">
  Nenhum dado encontrado!
</div>
<?php endif; ?>