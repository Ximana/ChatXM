<?php
class ConexaoMySQL {
    private $conexao;

    public function __construct($host, $usuario, $senha, $banco) {
        $this->conexao = new mysqli($host, $usuario, $senha, $banco);

        if ($this->conexao->connect_error) {
            die("Erro na conexão com o MySQL: " . $this->conexao->connect_error);
        }
    }

    public function realizarConsulta($sql) {
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }
}

class SistemaLogin {
    private $conexao;

    public function __construct(ConexaoMySQL $conexao) {
        $this->conexao = $conexao;
    }

    public function fazerLogin($nomeUsuario, $senha) {
        $nomeUsuario = $this->conexao->conexao->real_escape_string($nomeUsuario);
        $senha = $this->conexao->conexao->real_escape_string($senha);
        $senha = md5($senha); // Lembre-se de usar hash ou criptografia adequada

        $sql = "SELECT * FROM usuarios WHERE nome_usuario = '$nomeUsuario' AND senha = '$senha'";
        $resultado = $this->conexao->realizarConsulta($sql);

        if ($resultado && $resultado->num_rows == 1) {
            // Login bem-sucedido
            session_start();
            $_SESSION['nome_usuario'] = $nomeUsuario;
            return true;
        } else {
            // Credenciais inválidas
            return false;
        }
    }

    public function fazerLogout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function estaLogado() {
        session_start();
        return isset($_SESSION['nome_usuario']);
    }
}

// Exemplo de uso
$host = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";

$conexao = new ConexaoMySQL($host, $usuario, $senha, $banco);
$sistemaLogin = new SistemaLogin($conexao);

if ($sistemaLogin->estaLogado()) {
    echo "Você está logado como " . $_SESSION['nome_usuario'];
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_usuario']) && isset($_POST['senha'])) {
        $nomeUsuario = $_POST['nome_usuario'];
        $senha = $_POST['senha'];

        if ($sistemaLogin->fazerLogin($nomeUsuario, $senha)) {
            echo "Login bem-sucedido! Você está logado como " . $_SESSION['nome_usuario'];
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if (!$sistemaLogin->estaLogado()): ?>
        <form method="post" action="">
            <label for="nome_usuario">Nome de Usuário:</label>
            <input type="text" name="nome_usuario" id="nome_usuario"><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha"><br>

            <input type="submit" value="Login">
        </form>
    <?php else: ?>
        <form method="post" action="">
            <input type="submit" name="logout" value="Logout">
        </form>
    <?php endif; ?>
</body>
</html>
