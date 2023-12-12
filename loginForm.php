<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/fontawesome.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link href="css/estilo.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div class="login">
            <form action="include/login.php" method="post">
                <h1 class="text-center">Bem Vindo</h1>
                <!-- Mensagem de erro   -->
                <?php if (isset($_GET['mensagem_erro'])) {   ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $_GET['mensagem_erro']; ?>
                </div>
                <?php } ?>
                <!--Fim Mensagem de erro   -->
                <div class="form-group was-validated">
                    <label class="form-label label" for="email">Email ou Telemóvel</label>
                    <input class=" input-form" type="text" name="email" id="email"  required>
                </div>

                <div class="form-group was-validated">
                    <label class="form-label label" for="senha">Senha</label>
                    <input class=" input-form" type="password" name="senha" id="senha" required>

                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="lembrar" id="lembrarSenha">
                    <label class="form-check-label" for="lembrarSenha">Guardar Senha</label>
                </div>
                <span class="" for=""><a href="criarContaForm.php">Criar conta</a></span>

                <input class="btn btn-g  w-100" type="submit" value="Continuar">



            </form>

        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>
