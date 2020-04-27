      <!-- Body -->

<div class="form-row" align="center">

&#160;&#160;&#160; &#160; &#160;
<h1>Perfil</h1>
</div>

<div id="messagem"></div>

<div class="form-row">

&#160;&#160;&#160;&#160;&#160;&#160;



<?php foreach($usr as $key): ?>

<div class="col-md-8">

<table class="minha-tabela" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome:&#160;&#160; </th>
      <td><?php echo $key['usr_nome']; ?></td> 
      </tr>
   </thead>
    <thead>   
      <tr>      
      <th scope="col">CPF:&#160;&#160; </th>
      <td><?php echo $key['usr_cpf']; ?></td>   
    </tr>
  </thead>
   <thead>
    <tr>
    <th scope="col">E-mail:&#160;&#160; </th> 
    <td><?php echo $key['usr_email']; ?></td> 
    </tr>
  </thead>
   <thead>
      <tr>
      <th scope="col">Endereço:&#160;&#160; </th> 
      <td><?php echo $key['usr_endereco']; ?></td> 
      </tr>
    </thead>
   <thead>
      <tr>
      <th scope="col">Bairro:&#160;&#160; </th> 
      <td><?php echo $key['usr_bairro']; ?></td> 
      </tr>
    </thead>    
   <thead>
      <tr>
      <th scope="col">Cidade:&#160;&#160; </th> 
      <td><?php echo $key['usr_cidade']; ?></td> 
      </tr>
    </thead>
   <thead>
      <tr>
      <th scope="col">Estado:&#160;&#160; </th> 
      <td><?php echo $key['usr_estado']; ?></td> 
      </tr>
    </thead>        
     <thead>
      <tr>
     <th scope="col">Tel.:&#160;&#160;</th>
     <td><?php echo $key['usr_telefone']; ?></td>    
      </tr>
    </thead>
     <thead>

      <?php if($key['usr_id_roles'] == 1): ?>
      <tr>
      <th scope="col">senha:</th> 
     <td><a href="javascript:;" onclick="trocarSenha('<?php echo $key['usr_id']; ?>')" > Alterar Senha </a></td>
      </tr>
      <?php endif; ?>
      <thead>
        <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>

        </tr>
      </thead>

  </tbody>
</table>
<?php endforeach; ?>
</div>

</div>



    <!-- Modal -->
      <div id="modal_trocarSenha" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>