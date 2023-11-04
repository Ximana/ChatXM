<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/fontawesome.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/login.css"
        <link href="css/main.css" rel="stylesheet" media="all">
    </head>
    <body>
        <div class="login">
            <form action="include/login.php" method="post">
                <h1 class="text-center">Bem Vindo</h1>


                <div class="form-group was-validated">
                    <label class="form-label label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required>
                    <div class="invalid-feedback">
                        Por favor insira o seu email
                    </div>
                </div>

                <div class="form-group was-validated">
                    <label class="form-label" for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" required>
                    <div class="invalid-feedback">
                        Por favor insira a sua senha
                    </div>
                </div>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="lembrar" id="lembrarSenha">
                    <label class="form-check-label" for="lembrarSenha">Guardar Senha</label>
                </div>
                <span class="" for=""><a href="criarContaForm.php">Criar conta</a></span>

                <input class="btn btn-success  w-100" type="submit" value="Continuar">



            </form>

        </div>
    </body>
</html>
