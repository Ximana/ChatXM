class MinhaClasseDeBancoDeDados {
    private $conexao;
    
    public function __construct($host, $usuario, $senha, $banco) {
        $this->conexao = new mysqli($host, $usuario, $senha, $banco);
        
        if ($this->conexao->connect_error) {
            die("Erro na conexão com o MySQL: " . $this->conexao->connect_error);
        }
    }
    
    public function adicionar($tabela, $dados) {
        $colunas = implode(', ', array_keys($dados));
        $valores = "'" . implode("', '", array_values($dados)) . "'";
        $sql = "INSERT INTO $tabela ($colunas) VALUES ($valores)";
        
        return $this->conexao->query($sql);
    }
    
    public function atualizar($tabela, $dados, $condicao) {
        $valores = '';
        foreach ($dados as $coluna => $valor) {
            $valores .= "$coluna = '$valor', ";
        }
        $valores = rtrim($valores, ', ');
        $sql = "UPDATE $tabela SET $valores WHERE $condicao";
        
        return $this->conexao->query($sql);
    }
    
    public function remover($tabela, $condicao) {
        $sql = "DELETE FROM $tabela WHERE $condicao";
        
        return $this->conexao->query($sql);
    }
    
    public function selecionar($tabela, $colunas, $condicao = '') {
        $colunas = implode(', ', $colunas);
        $sql = "SELECT $colunas FROM $tabela";
        if (!empty($condicao)) {
            $sql .= " WHERE $condicao";
        }
        
        $resultado = $this->conexao->query($sql);
        $dados = array();
        
        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $dados[] = $row;
            }
        }
        
        return $dados;
    }
    
    public function login($tabela, $usuario, $senha) {
        $usuario = $this->conexao->real_escape_string($usuario);
        $senha = $this->conexao->real_escape_string($senha);
        $senha = md5($senha); // Certifique-se de usar hash ou criptografia adequada

        $sql = "SELECT * FROM $tabela WHERE nome_usuario = '$usuario' AND senha = '$senha'";
        $resultado = $this->conexao->query($sql);
        
        return ($resultado && $resultado->num_rows == 1);
    }
    
    public function logout() {
        // Implementar lógica de logout, se necessário
    }
}
