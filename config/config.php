<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = 'bdjmf';
    $dbName = 'new_agenda';
    
    $conexao = new PDO($dbHost,$dbUsername,$dbPassword,$dbName);

     if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>