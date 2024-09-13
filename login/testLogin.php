<?php
session_start();
include_once('../config/config.php');

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de configuração com dados de conexão
    

    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        // Conecta ao banco de dados usando PDO
        
        // Prepara a consulta SQL para selecionar o usuário com o email fornecido
        $stmt = $conexao->prepare('SELECT * FROM usuarios WHERE email = :email');
        $stmt->execute(['email' => $email]);

        // Verifica se o usuário foi encontrado
        if ($stmt->rowCount() > 0) {
            // Recupera os dados do usuário
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha fornecida corresponde à senha armazenada (hash comparado com hash)
            if (password_verify($senha, $user['senha'])) {
                // Se a senha estiver correta, define variáveis de sessão e redireciona
                $_SESSION['email'] = $email;
                header('Location: ../sistema/sistema.php');
                exit();
            } else {
                // Se a senha estiver incorreta, destrói a sessão e redireciona
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: login.php');
                exit();
            }
        } else {
            // Se o usuário não for encontrado, destrói a sessão e redireciona
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: ../login/login.php');
            exit();
        }
    } catch (PDOException $e) {
        // Trata erros de conexão
        echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }
} else {
    // Se o formulário não foi enviado corretamente, redireciona para login
    header('Location: ../login/login.php');
    exit();
}
?>
