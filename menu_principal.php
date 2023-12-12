<div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ChatXM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php"><i class="fa fa-home fa-2x text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><i class="fa fa-user fa-2x text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat_grupo.php"><i class="fa fa-users  fa-2x text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php"><i class="fa fa-comments fa-2x text-white"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="include/logout.php"><i class="fa fa-close fa-2x text-white"></i></a>
                    </li>
                </ul>

            </div>
            <a class="navbar-brand" href="perfil.php">
                <img src="include/imagensUsuario/<?php echo $row['imagem']; ?>" alt="avatar" style="border-radius: 40px; " width="30" height="24" class="d-inline-block align-text-top">
                <?php echo "" . $row['nome'] . " " . $row['apelido']; ?>

            </a>

        </div>
    </nav>
</div>