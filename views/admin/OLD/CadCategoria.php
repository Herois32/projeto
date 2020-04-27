       <h6 class="border-bottom border-gray pb-2 mb-0">Cadastrar Categoria</h6>
       <!-- SE O USUARIO ADICINADO COM SUCESSO!  -->
       <?php echo (!empty($alert) ? $alert : '' ); ?>

       <!-- MENSAGEM DE ERROR SE O USUÁRIO JA FOR CADASTRADO  -->
       <?php echo (!empty($error) ? $error : '' ); ?>       

        <br/>

<form action="<?php echo BASE_URL; ?>categorias/add" method="POST">

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail">Nome da Categoria:</label>
      <input type="text" name="nome_categora" class="form-control" id="inputCategoria" required>
    </div>

  </div>


      


  
  <button type="submit" class="btn btn-primary">Cadastrar</button>

<a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Cancelar</a>


        </form>
      

  </div> 

</main>

</body>

</html>