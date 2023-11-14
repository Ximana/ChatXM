<?php
include_once 'include/dados_do_usuario.php';


?>

<!doctype html>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" >   
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <link href="css/chatCss.css" rel="stylesheet" />
        <link href="css/estilo.css" rel="stylesheet" media="all">
        
        <title>ChatXM!</title>
    </head>
    <body>
        <div class="container">


            <!-- MENU     --><!-- MENU     -->
            <?php include_once './menu_principal.php';  ?>
            <!-- FIM MENU     -->
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card chat-app ">


                        <!-- Lista de Pessoas Disponiveis 
                        
                        
                        <div id="plist" class="lista-pessoas usuarios">

                            <form method="get" action="index.php" class="input-group pesquisa">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Pesquisar pessoas..." name="pesqiosaUsuario">
                            </form>

                            <ul class="usuarios-lista list-unstyled chat-lista mt-2 mb-0 " >

                                <//?php include_once './usuariosLogados.php'; ?>
                            </ul>
                        </div>
                        
                        
                        FIM Lista de Pessoas Disponiveis -->



                        <!-- Chat -->
                        <div class="">

                                <div class="row  mt-3">
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <?php echo date("l jS  F Y h:i");  ?>
                                    </div>

                                    <!--
                                    <div class="col-lg-6 hidden-sm text-right">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                        <a href="login.html" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                    </div>
                                    -->
                                </div>
                                
                                <div class="row justify-content-center mt-5 pt-5 pb-5">
                                    <img src="imagem/logo.png" class="img img-fluid  " width="300" height="300" alt="alt"/>
                                    <span class="col-12 text-center mt-5">Copyright 2023 by Paulo Ximana</span>
                                </div>
                                


                        </div>
                        <!-- FIM Chat -->



                    </div>
                </div>
            </div>
        </div>







        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js" ></script>
        <script src="js/listar_usuarios.js" ></script>
        <script src="js/mensagens.js" ></script>
    </body>
</html>



