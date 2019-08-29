<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ESTILO -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PORTAL ?>css/login.css">

    

  <title>Login | Althaia</title>
  </head>
  <body>
    <base base="<?php echo INCLUDE_PATH_PORTAL; ?>" />
    <div class="top">
        <div class="center">
            <img src="<?php echo INCLUDE_PATH_PORTAL ?>imagens/logo.png">
        </div><!--center-->
    </div><!--top-->

    <div class="formulario">
        <div id="erroLogin"></div>
        <form method="post" id="formLogin">
            <div class="form-group">
                <label>Usuário:</label>
                <input id="usuario" type="text" class="form-control" name="usuario" required>
            </div><!--form-group-->
            <div class="form-group">
                <label>Senha:</label>
                <input id="senha" type="password" class="form-control" name="senha" required>
            </div><!--form-group-->
            <div class="form-group text-center">
                <input type="hidden" name="entrarSistema">
                <button type="submit" name="login" class="btn btn-primary" id="login">ENTRAR</button>
            </div><!--form-group-->
        </form>
    </div><!--formulario-->

<!--JAVASCRIPT BOOTSTRAP-->
<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/jquery.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/bootstrap.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PORTAL ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH_PORTAL ?>Controlador/UsuariosControlador.js"></script>
    
</body>
</html>