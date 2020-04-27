<!DOCTYPE html>
<html lang="en">
<head>
  <title>ConhecerMais - Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
  
  <div class="limiter">
    <div class="container-login100">  
      <div class="wrap-login100">
        <form action="<?php echo BASE_URL ?>home" method="POST" class="login100-form validate-form">
          <div align="center">
        <?php echo (!empty($alert) ? $alert : '' ); ?>
       <!-- Div de alert para ERROS na senha, desativado e fora do horario da aula -->     
       </div>        
          <span class="login100-form-title p-b-43">
            Faça o Login
          </span>
          
          
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email">
            <span class="focus-input100"></span>
            <span class="label-input100">E-mail</span>
          </div>
          
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">Senha</span>
          </div>

          <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            </div>

            <div>
              <a href="#" class="txt1">         
            Esqueceu a senha?
              </a>
            </div>
          </div>
      

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          
          <div class="text-center p-t-46 p-b-20">
            <span class="txt2">
             <a href="#"> ou se escreva aqui </a>
            </span>
          </div>

          <div class="login100-form-social flex-c-m">
   

         
          </div>
        </form>

        <div class="login100-more" style="background-image: url('<?php echo BASE_URL; ?>assets/images/conhecermais.png');">
        </div>
      </div>
    </div>
  </div>
  
  

  
  
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>

</body>
</html>