       <h6 class="border-bottom border-gray pb-2 mb-0">Lista de Usuários</h6>

<!-- SE O USUARIO FOR DELETADO COM SUCESSO!  -->
    <?php 
    echo (!empty($mensagem) ? $mensagem : '' ); 

    $desativado = '<div class="font-aberto">Desativado</div>';
    ?>
        <br/>
   <div class="altera-fontes">   
    <div class="form-row">

    <table  class="table table-bordered" cellspacing="0" style="width: 100%;table-layout:fixed">
      <thead>
        <tr align="center">
          <th width="5%" scope="col"></th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th> 
          <th scope="col">Empresa</th>
          <th scope="col">Perfil</th>
          <th scope="col">Status</th>
          <th scope="col">Trocar Senha</th>
          <th scope="col">Editar</th>
          <th scope="col">Desativar</th>

        </tr>
      </thead>
      <tbody align="center">
    <?php foreach($info as $dados):?>
        <tr>
          <th scope="row"><img src="<?php echo BASE_URL; ?>assets/images/user.png" class="img-responsive" alt="usuraio" width="25" height="25"></th>
          <td><?php echo $dados['usr_nome']; ?></td>
          <td><?php echo $dados['usr_email']; ?></td>
          <td><?php echo $dados['ep_razao_social']; ?></td>
          <td><?php echo $dados['rl_perfil']; ?></td>
          <td><?php echo ($dados['usr_status'] == "Desativado" ? $desativado : "Ativo"); ?></td>


          <td width=" 50" align="center">

         <a href="javascript:;" onclick="trocarSenha('<?php echo $dados['usr_id']; ?>')" > <img src="<?php echo BASE_URL; ?>assets/images/alt_senha.png" class="img-responsive" title ="Alterar Senha" alt="Alterar Senha">  </a>
         </td>
         <td width=" 50" align="center">
          <a href="javascript:;" onclick="atualizarUsr('<?php echo $dados['usr_id']; ?>')"> <img src="<?php echo BASE_URL; ?>assets/images/edit.png" class="img-responsive" title ="Editar Usuário" alt="Editar"> </a>
         </td>
         <td width="50" align="center">
         <a href="<?php echo BASE_URL; ?>usuario/desativar/<?php echo $dados['usr_id']; ?>"><img img src="<?php echo BASE_URL; ?>assets/images/delet.png" class="img-responsive" title ="Desativar Usuário" alt="Desativar">  </a>
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