<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = 'bdjmf';
    $dbName = 'new_agenda';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // // Verificar a conexão
    // if ($conn->connect_error) {
    //     die("Conexão falhou: " . $conn->connect_error);
    // }
    
    // // Executar a consulta SQL
    // $sql = "SELECT * FROM usuarios";
    // $result = $conn->query($sql);
    
    // // Verificar se a consulta foi bem-sucedida
    // if (!$result) {
    //     die("Erro na consulta: " . $conn->error);
    // }