<div class="form-row" align="center">

<div class="form-row">
<?php foreach ($dados as $result): ?>
    <table  class="border-0" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th width="5%" scope="col"><?php echo $result['ms_titulo']; ?></th>

        </tr>
      </thead>
      <tbody align="center">
         <tr>       
      <td>
        <?php echo utf8_encode($result['ms_descricao']); ?>
         </td>
        </tr>
      </tbody> 
    </table> 

<?php endforeach; ?>  

          <form>
   
          <button type="submit" class="btn btn-primary">Fechar</button>

          </form>

</div>
</div>


















