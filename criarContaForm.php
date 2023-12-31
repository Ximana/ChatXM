<!DOCTYPE html>
<html lang="pt">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Colorlib Templates">
        <meta name="author" content="Colorlib">
        <meta name="keywords" content="Colorlib Templates">

        <!-- Title Page-->
        <title>Criar Conta</title>

        <!-- Icons font CSS-->
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/estilo.css" rel="stylesheet" media="all">
        <link href="css/criarConta.css" rel="stylesheet" media="all">
    </head>

    <body>
        <div class="page-wrapper p-t-30 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">



                        <form method="post" action="include/cadastroUsuario.php" enctype="multipart/form-data">
                            <h1 class="">Criar conta</h1>
                            <?php if (isset($_GET['mensagem_erro'])) { ?>
                                <div class="" style=" display: inline; background-color: #ff7575; padding: 5px 20px; margin: 5px;" >
                                    
                                    <?php echo $_GET['mensagem_erro']; ?>
                                </div>
                            <?php } ?>
                           
                           
                              
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Nome</label>
                                        <input class="input-form" type="text" name="nome">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Apelido</label>
                                        <input class="input-form" type="text" name="apelido">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Data de Nascimento</label>
                                        <div class="input-group-icon">
                                            <input class="input-form js-datepicker" type="text" name="nascimento">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Genero</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">Masculino
                                                <input type="radio" checked="checked" name="genero" value="Masculino">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">Femenino
                                                <input type="radio" name="genero" value="Femenino">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Email</label>
                                        <input class="input-form" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Telefone</label>
                                        <input class="input-form" type="tel" name="telefone">
                                    </div>
                                </div>
                            </div>


                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Senha</label>
                                        <input class="input-form" type="password" name="senha">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Imagem</label>
                                        <input class="input-form" type="file" name="imagem">
                                    </div>
                                </div>
                            </div>




                            <div class="p-t-15">
                                <button class=" btn-verde " type="submit">Continuar</button>
                            </div>
                            <div>
                                Já tem uma conta? faça <a href="loginForm.php">login</a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>

        <!-- Main JS-->
        <script src="js/global.js"></script>
        <script src="js/novaConta.js"></script>

    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->