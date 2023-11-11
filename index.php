<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: loginForm.php");
}

// Pegar dados do usuario
include_once 'include/conexao.php';
$query = "SELECT * FROM usuario WHERE id_usuario = " . $_SESSION['id_usuario'] . "";
$sql = mysqli_query($conexao, $query);
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}

//Pegar Dados do amigo selecionado para conversa se estiver setada
if (isset($_GET['amigo'])) {
    $id_amigo = mysqli_real_escape_string($conexao, $_GET['amigo']);

    $query2 = "SELECT * FROM usuario WHERE id_usuario = " . $id_amigo . "";
    $sql2 = mysqli_query($conexao, $query2);
    if (mysqli_num_rows($sql2) > 0) {
        $amigo = mysqli_fetch_assoc($sql2);
    }
}
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
        
        <title>ChatXM!</title>
    </head>
    <body>






        <div class="container">


            <!-- MENU     -->
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php">ChatXM</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="include/logout.php">Sair</a>
                                </li>
                            </ul>

                        </div>
                        <a class="navbar-brand" href="#">
                            <img src="include/imagensUsuario/<?php echo $row['imagem']; ?>" alt="avatar" style="border-radius: 40px; " width="30" height="24" class="d-inline-block align-text-top">
                            <?php echo "" . $row['nome'] . " " . $row['apelido']; ?>

                        </a>

                    </div>
                </nav>
            </div>
            <!-- FIM MENU     -->





            <div class="row clearfix">



                <div class="col-lg-12">
                    <div class="card chat-app">


                        <!-- Lista de Pessoas Disponiveis -->
                        <div id="plist" class="lista-pessoas usuarios">

                            <form method="get" action="index.php" class="input-group pesquisa">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Pesquisar pessoas..." name="pesqiosaUsuario">
                            </form>

                            <ul class="usuarios-lista list-unstyled chat-lista mt-2 mb-0 " >

                                <?php include_once './usuariosLogados.php'; ?>
                            </ul>
                        </div>
                        <!-- FIM Lista de Pessoas Disponiveis -->







                        <!-- Chat -->
                        <div class="chat">

                            <!<!-- Se tiver selecionado uma pessoa para conversar --- mostra as mensagens -->
                            <?php if (isset($id_amigo)) { ?>


                                <div class="chat-cabecalho clearfix">

                                    <div class="row">



                                        <!-- Dados da pessoa selecionada -->
                                        <div class="col-lg-6">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                <img src="include/imagensUsuario/<?php echo $amigo['imagem']; ?>" alt="avatar">
                                            </a>
                                            <div class="chat-about">
                                                <h6 class="m-b-0"><?php echo "" . $amigo['nome'] . " " . $amigo['apelido']; ?></h6>
                                                <small>Ultima sessão <?php echo $amigo['Ultima_atividade']; ?></small>
                                            </div>
                                        </div>
                                        <!-- Fim Dados da pessoa selecionada -->

                                        <div class="col-lg-6 hidden-sm text-right">
                                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                            <a href="login.html" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                        </div>
                                    </div>
                                </div>


                                <!-- Mensagns -->
                                <div class="chat-historico">
                                    <ul class="m-b-0 mensagens-lista">
                                        
                                         <?php include_once './mensagens.php'; ?>

                                    </ul>
                                </div>
                                <!-- Fim Mensagns -->

                                <!-- Formulario enviar mensagem -->
                                <form action="include/enviarMensagem.php" method="post" class="chat-mensagem clearfix">
                                    <div class="input-group mb-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                                        </div>
                                        <input name="receptor" type="hidden" value="<?php echo $id_amigo; ?>">
                                        <input name="mensagem" type="text" class="form-control" placeholder="Escreva a sua mensabem ...">                                    
                                    </div>
                                </form>
                                 <!-- Fim formulario enviar mensagem -->



                                <!-- Se nao selecionado mostra o logo do chat -->
                            <?php } else { ?>

                                <div class="row  mt-3">
                                    <!--  -->
                                    <div class="col-lg-6">
                                        <?php echo date("l jS  F Y h:i: A");  ?>
                                    </div>
                                    <!-- Fim Dados da pessoa selecionada -->

                                    <div class="col-lg-6 hidden-sm text-right">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                        <a href="login.html" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                    </div>
                                </div>
                                
                                <div class="row justify-content-center mt-5 pt-5 pb-5">
                                    <img src="imagem/logo.png" class="img img-fluid  " width="300" height="300" alt="alt"/>
                                    <span class="col-12 text-center mt-5">Copyright 2023 by Paulo Ximana</span>
                                </div>
                                
                            <?php } ?>


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



