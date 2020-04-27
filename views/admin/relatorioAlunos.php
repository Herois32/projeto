<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de alunos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>Nome</th>
                      <th>cpf</th>
                      <th>email</th>
                      <th>tel</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($info as $valor): ?>
                    <tr>
                      <td><?php echo $valor['usr_nome']; ?></td>
                      <td><?php echo $valor['usr_cpf']; ?></td>
                      <td><?php echo $valor['usr_email']; ?></td>
                      <td><?php echo $valor['usr_telefone']; ?></td>                     
                    </tr>
                  <?php endforeach; ?>
 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

