<?php
include_once('../config/config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    try {
        // Conectar ao banco de dados usando PDO
        $conexao = new PDO('mysql:host=localhost;dbname=your_database;charset=utf8', 'your_username', 'your_password');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar a consulta SQL de atualização
        $sqlUpdate = 'UPDATE usuarios 
                      SET nome = :nome, senha = :senha, email = :email, telefone = :telefone, sexo = :sexo, 
                          data_nasc = :data_nasc, cidade = :cidade, estado = :estado, endereco = :endereco
                      WHERE id = :id';
        
        // Preparar a consulta
        $stmt = $conexao->prepare($sqlUpdate);

        // Executar a consulta com os dados do formulário
        $stmt->execute([
            ':nome' => $nome,
            ':senha' => $senha,
            ':email' => $email,
            ':telefone' => $telefone,
            ':sexo' => $sexo,
            ':data_nasc' => $data_nasc,
            ':cidade' => $cidade,
            ':estado' => $estado,
            ':endereco' => $endereco,
            ':id' => $id
        ]);

        // Opcional: Verificar se a atualização foi bem-sucedida
        if ($stmt->rowCount() > 0) {
            echo 'Atualização bem-sucedida!';
        } else {
            echo 'Nenhuma alteração realizada.';
        }
    } catch (PDOException $e) {
        // Tratar erros de conexão e execução
        echo 'Erro: ' . $e->getMessage();
    }
    
    // Redirecionar para a página sistema.php após 3 segundos
    header('Refresh: 3; url=sistema.php');
    exit();
}
?>
