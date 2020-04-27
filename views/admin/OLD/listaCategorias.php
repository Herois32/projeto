       <h6 class="border-bottom border-gray pb-2 mb-0">Lista de Categorias</h6>

<!-- SE O CATEGORIA FOR DELETADO COM SUCESSO!  -->
    <?php echo (!empty($mensagem) ? $mensagem : '' ); ?>
        <br/>
   <div class="altera-fontes">   
    <div class="form-row">

    <table  class="table table-bordered" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th width="5%" scope="col"></th>
          <th scope="col">Categoria</th>
          <th scope="col">Excluir</th>

        </tr>
      </thead>
      <tbody align="center">
    <?php foreach($listar as $chave):?>
        <tr>
          <th scope="row"><img src="https://phidelis.com.br/Content/imagens/sites/icone-2.png" class="img-responsive" alt="usuraio" width="25" height="25"></th>
          <td><?php echo $chave['cg_categoria'];  ?></td>
         <td width="50" align="center">
         <a href="<?php echo BASE_URL; ?>categorias/excluirCategoria/<?php echo $chave['cg_id']; ?>"><img img src="<?php echo BASE_URL; ?>assets/images/delet.png" class="img-responsive" title ="Excluir Categoria" alt="Excluir">  </a>
         </td>
        </tr>
       <?php endforeach; ?> 
      </tbody>
     
    </table>     
          
        <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Voltar</a>  
          
    <!-- Modal -->
      <div id="modal" class="modal fade" role="dialog" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>
</div>

</main>

</body>

</html>