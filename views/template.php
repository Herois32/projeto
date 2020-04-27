<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ConhecerMais</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo BASE_URL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo BASE_URL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">

  


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASE_URL; ?>home/painel">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Conhecer Mais <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASE_URL; ?>home/painel">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tela Incial</span></a>
      </li>

     <?php if($_SESSION['cIdRoles'] == 1 ): ?>
      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Heading -->
      <div class="sidebar-heading">
        Administrador
      </div>

     <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Componentes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personalizar:</h6>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>aulas">Agendar Aulas</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>agenda">Agendamentos</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>mensagem">Cadastro Anúncio</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>usuario/cadastrarUsuario">Cadastro Admin</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>usuario/listar">Listar Admin</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Relatórios</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Estatícas:</h6>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>relatorios/aqtAcessos">Quantidade de Acessos</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>relatorios/dadosAlunos">Dados dos Alunos</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>relatorios/graficos">Gráficos</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>relatorios/comparativo">Comparativo</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
   <!--   <hr class="sidebar-divider"> -->

      <!-- Heading -->
    <!--  <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
    <!--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="<?php echo BASE_URL; ?>assets/blank.html">Blank Page</a>
          </div>
        </div>
      </li><!-->

      <!-- Nav Item - Charts -->
   <!--   <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->
 
      <? endif; ?>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>pagamento">
          <i class="fas fa-fw fa-table"></i>
          <span>Inscrição</span></a>
      </li>


<?php if($_SESSION['cIdRoles'] == 2 ): ?>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>certificados">
          <i class="fas fa-award"></i>
          <span>Certificados</span></a>
      </li>

<?php endif; ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->



     <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



            <?php

            $msg = new Avisos();

            $mensagens = $msg->getMensagens();
            $qtd = $msg->qtdMensagens();
           

            ?>            

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo (!empty($qtd) ? $qtd : '0' ); ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerta de mensagens
                </h6>
                <?php foreach($mensagens as $mensag): ?>
                <a class="dropdown-item d-flex align-items-center" href="javascript:;" onclick="modalMensagem('<?php echo $mensag['ms_id']; ?>')">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo date("d/m/Y", strtotime($mensag['ms_data'])); ?></div>
                    <span class="font-weight-bold"><?php echo $mensag['ms_titulo']; ?></span>
                  </div>
                </a>
           <?php endforeach; ?>     
               <a class="dropdown-item text-center small text-gray-500" href="#">Mensagens Atualizadas</a>
              </div>
            </li>

            <?php

            $alunos = new Avisos();

            $status = "Online";
            $id_roles = 2;

            $result = $alunos->getAlunoOline($status, $id_roles);
            $dados = $alunos->qtdOnline($status, $id_roles);
           

            ?>


            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="<?php echo BASE_URL; ?>avisos" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo (!empty($dados) ? $dados : '0' ); ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Alunos Online
                </h6>

                
                  <?php if(!empty($result)): ?>
                    <?php foreach($result as $key): ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <?php if($key['usr_sexo'] == "F"): ?>
                    <img class="rounded-circle" src="https://cdn.pixabay.com/photo/2014/03/25/16/54/user-297566_960_720.png" alt="">
                  <?php endif; ?>
                    <?php if($key['usr_sexo'] == "M"): ?>
                    <img class="rounded-circle" src="https://cdn.pixabay.com/photo/2012/04/13/21/07/user-33638_960_720.png" alt="">
                  <?php endif; ?>                  
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $key['usr_nome']; ?></div>
                    <div class="small text-gray-500"><?php echo $key['usr_status']; ?></div>
                  </div>
                </a>

              <?php endforeach; ?>  
              <?php endif ?>
              <?php if(empty($result)): ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="text-truncate">Nenhum Usuário Logado</div>
                </a>
               <?php endif ?> 
              
                <a class="dropdown-item text-center small text-gray-500" href="#">Todos os Usuários logado no momento</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['cNome']; ?></span>

                <?php if($_SESSION['cSexo'] == "F"): ?>
                <img class="img-profile rounded-circle" src="https://cdn.pixabay.com/photo/2014/03/25/16/54/user-297566_960_720.png">
                <?php endif; ?>

                <?php if($_SESSION['cSexo'] == "M"): ?>
                <img class="img-profile rounded-circle" src="https://cdn.pixabay.com/photo/2012/04/13/21/07/user-33638_960_720.png">
                <?php endif; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>usuario/perfilUsuario">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
              <!--  <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuração
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Registro de Atividades
                </a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

  

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Desenvolvido pela Sofdev 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "SAIR" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo BASE_URL ?>login/sair">SAIR</a>
        </div>
      </div>
    </div>
  </div>



    <!-- Modal -->
      <div id="modal_mensagens" class="modal fade" role="dialog" >
        <div class="modal-dialog" >
          <div class="modal-content">
            <div class="modal-body">....</div>
          </div>
        </div>
      </div>



<!-- Bootstrap core JavaScript-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/jquery.min.js"></script>

 <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

 <script src="<?php echo BASE_URL; ?>assets/js/MascaraValidacao.js"></script>
 
 <!--<script src="<?php echo BASE_URL; ?>assets/js/atualizar.js"></script> --> 

  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo BASE_URL; ?>assets/js/sb-admin-2.min.js"></script>




</body>

</html>