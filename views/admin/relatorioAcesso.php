<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Quantidade de acesso por aluno</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>Aluno</th>
                      <th>Qtd. de Acesso</th>
                      <th>Último acesso</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($info as $key): ?>
                    <tr>
                      <td width="15%"><?php echo $key['usr_nome']; ?></td>
                      <td align="center" width="5%"><?php echo $key['usr_logado']; ?></td>
                      <td align="center" width="5%"><?php echo (date("d/m/Y", strtotime($key['usr_ultimo_acesso'])) == "31/12/1969") ? '' : date("d/m/Y H:i:s", strtotime($key['usr_ultimo_acesso'])) ?></td>                     
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

      
       