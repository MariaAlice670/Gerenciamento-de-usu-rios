<?php
include_once('../config/config.php');

// Verifica se o parâmetro 'id' está presente e é um número inteiro
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast para garantir que o ID seja um número inteiro

    try {
        // Conectar ao banco de dados usando PDO
        $conexao = new PDO('mysql:host=localhost;dbname=your_database;charset=utf8', 'your_username', 'your_password');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar e executar a consulta DELETE
        $stmtDelete = $conexao->prepare('DELETE FROM usuarios WHERE id = :id');
        $stmtDelete->execute(['id' => $id]);

        // Opcional: verificar se a exclusão foi bem-sucedida
        if ($stmtDelete->rowCount() > 0) {
            // Mensagem de sucesso opcional (pode ser removida se não for necessária)
            echo 'Usuário excluído com sucesso!';
        } else {
            // Mensagem opcional se o usuário não for encontrado (pode ser removida se não for necessária)
            echo 'Nenhum usuário encontrado com o ID fornecido.';
        }
    } catch (PDOException $e) {
        // Tratar erros de conexão e execução
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    // Redirecionar se o parâmetro 'id' não estiver presente ou não for numérico
    header('Location: sistema.php');
    exit();
}

// Redirecionar para a página sistema.php após a execução
header('Location: sistema.php');
exit();
?>
