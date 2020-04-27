       <h6 class="border-bottom border-gray pb-2 mb-0">Lista de Empresas</h6>
<!-- ALERT QUANDO A ALTERAÇÃO FOR REALIZADO COM SUCESSO -->
  <?php echo (!empty($aviso) ? $aviso : '' ); ?>

<!-- ALERT QUANDO A EXCLUSÃO FOR REALIZADA COM SUCESSO -->
  <?php echo (!empty($mensagem) ? $mensagem : '' ); ?>  

  <?php $desativado = '<div class="font-aberto">Desativado</div>'; ?>
        <br/>

 <div class="altera-fontes">  
  <div class="form-row">
    <table class="table table-bordered" style="width: 100%;table-layout:fixed">
     <thead>
        <tr align="center">
          <th width="5%" scope="col"></th>
          <th scope="col">CNPJ</th>
          <th scope="col">Razão Social</th> 
          <th scope="col">Contato</th>
          <th scope="col">Situação</th>
          <th scope="col">Editar</th>
          <th scope="col">Desativar</th>

     
        </tr>
      </thead>
      <tbody align="center">

    <?php foreach($listar as $valor): ?>
          <tr>
          <th scope="row"><img src="<?php echo BASE_URL; ?>assets/images/company.png" class="img-responsive" alt="usuraio" width="25" height="25"></th>
          <td><?php echo $valor['ep_cnpj']; ?></td>
          <td><?php echo $valor['ep_razao_social']; ?></td>
          <td><?php echo $valor['ep_telefone']; ?></td>
          <td><?php echo ($valor['ep_status'] == "Desativado" ? $desativado : "Ativo"); ?></td>
          	<td align="center"><a href="<?php echo BASE_URL; ?>empresa/edit/<?php echo $valor['ep_id']; ?>"><img src="<?php echo BASE_URL; ?>assets/images/edit.png" class="img-responsive" alt="Editar" title="Editar Empresa"></a></td>   
            <td align="center"><a href="<?php echo BASE_URL; ?>empresa/desativar/<?php echo $valor['ep_id']; ?>"><img src="<?php echo BASE_URL; ?>assets/images/delet.png" class="img-responsive" alt="Desativar" title="Desativar"></a></td>   		
          
      
        </tr>
      <?php endforeach; ?>
      </tbody>
     
    </table>     
          <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Voltar</a>
    </div>
  </div> 

</main>

</body>

</html>