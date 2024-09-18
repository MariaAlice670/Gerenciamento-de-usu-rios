<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root"; // substitua pelo seu usuário do banco de dados
$password = "bdjmf"; // substitua pela sua senha do banco de dados
$dbname = "new_agenda"; // substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém os dados do formulário
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['data_nasc'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

// Prepara e executa a query de inserção
$sql = "INSERT INTO usuarios2 (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco);

if ($stmt->execute()) {
    // Obtém o id do usuário recém-criado
    $id_user = $stmt->insert_id;

    // Cria uma nova tabela para contatos se necessário
    $sql_contatos = "INSERT INTO usuarios2 (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?')";

    $stmt_contatos = $conn->prepare($sql_contatos);
    $stmt_contatos->bind_param("sss", $nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco);

    $stmt_contatos->execute();

    // Redireciona para sistema.php
    header("Location: sistema.php");
    exit();
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
