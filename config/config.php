<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'bdjmf';
    $dbName = 'new_agenda';

    try {
        // Cria uma nova instância PDO
        $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);

        // Configura o PDO para lançar exceções em caso de erro
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Se a conexão for bem-sucedida
        echo "Conexão efetuada com sucesso";
    } catch (PDOException $e) {
        // Se ocorrer um erro
        echo "Erro: " . $e->getMessage();
    }

?>