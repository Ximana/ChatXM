<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/chatCss.css" rel="stylesheet" />
    <!--

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      -->

    <title>ChatXM!</title>
  </head>
  <body>






<div class="container">


<!-- MENU     -->
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ChatXM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Sair</a>
        </li>
      </ul>

    </div>
    <a class="navbar-brand" href="#">
      <img src="include/imagensUsuario/avatar1.png" alt="avatar" style="border-radius: 40px; width: 40px;" width="30" height="24" class="d-inline-block align-text-top">
      Paulo Ximana
    </a>
  </div>
</nav>
    </div>
 <!-- IM MENU     -->




<div class="row clearfix">



    <div class="col-lg-12">
        <div class="card chat-app">
            
            
            <!-- Lista de Pessoas Disponiveis -->
            <div id="plist" class="lista-pessoas">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-lista mt-2 mb-0">
                    <li class="clearfix">
                        <img src="include/imagensUsuario/avatar1.png" alt="avatar">
                        <div class="about">
                            <div class="name">Vincent Porter</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                        </div>
                    </li>
                    <li class="clearfix active">
                        <img src="include/imagensUsuario/avatar2.png" alt="avatar">
                        <div class="about">
                            <div class="name">Aiden Chavez</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="include/imagensUsuario/avatar3.png" alt="avatar">
                        <div class="about">
                            <div class="name">Mike Thomas</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>                                    
                    <li class="clearfix">
                        <img src="include/imagensUsuario/avatar7.png" alt="avatar">
                        <div class="about">
                            <div class="name">Christian Kelly</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 10 hours ago </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="include/imagensUsuario/avatar8.png" alt="avatar">
                        <div class="about">
                            <div class="name">Monica Ward</div>
                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <img src="include/imagensUsuario/avatar3.png" alt="avatar">
                        <div class="about">
                            <div class="name">Dean Henry</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28 </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- FIM Lista de Pessoas Disponiveis -->


            
            
            

            
            <!-- Chat -->
            <div class="chat">
                <div class="chat-cabecalho clearfix">

                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="include/imagensUsuario/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">Aiden Chavez</h6>
                                <small>Last seen: 2 hours ago</small>
                            </div>
                        </div>
                        <div class="col-lg-6 hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="login.html" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>
                    </div>
                </div>


                <div class="chat-historico">
                    <ul class="m-b-0">
                        <li class="clearfix">
                            <div class="mensagem-dados text-right">
                                <span class="mensagem-data-hora">10:10 AM, Today</span>
                                <img src="include/imagensUsuario/avatar7.png" alt="avatar">
                            </div>
                            <div class="mensagem outra-messagem float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                        </li>
                        <li class="clearfix">
                            <div class="mensagem-dados">
                                <span class="mensagem-data-hora">10:12 AM, Today</span>
                            </div>
                            <div class="mensagem minha-mensagem">Are we meeting today?</div>                                    
                        </li>                               
                        <li class="clearfix">
                            <div class="mensagem-dados">
                                <span class="mensagem-data-hora">10:15 AM, Today</span>
                            </div>
                            <div class="mensagem minha-mensagem">Project has been already finished and I have results to show you.</div>
                        </li>
                    </ul>
                </div>
                <div class="chat-mensagem clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter text here...">                                    
                    </div>
                </div>
            </div>
             <!-- FIM Chat -->
            
            
            
        </div>
    </div>
</div>
</div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"> </script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>



