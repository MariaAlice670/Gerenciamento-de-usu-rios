<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | Usuários</title>
    <style>
        body {
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
            margin-left: 250px; /* Ajusta a margem para se adequar à barra lateral */
        }
        .table-bg {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }
        .box-search {
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: #343a40;
            padding: 20px;
        }
        #sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        #sidebar a:hover {
            color: #ddd;
            background-color: #495057;
        }
        .profile {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .profile img {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GDU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <!-- Sidebar -->
    <div id="sidebar">
        <h4>Menu</h4>
        <a href="dashboard.php">Dashboard</a>
        <a href="users.php">Usuários</a>
        <a href="settings.php">Configurações</a>
        <a href="reports.php">Relatórios</a>
    </div>
    <!-- Page Content -->
    <br>
    
    <!-- Perfil do Usuário -->
    <div class="profile">
        <img src="imagens/images.png" alt="Foto do Perfil"> <!-- Substitua pelo caminho da imagem do perfil -->
        <div>
            <?php
            // Verifica se a variável $logado está definida e não é vazia
            if (isset($logado) && !empty($logado)) {
                echo "<h1>Bem-vindo <u>" . htmlspecialchars($logado, ENT_QUOTES, 'UTF-8') . "</u></h1>";
            } else {
                echo "<h1>Bem-vindo, visitante!</h1>";
            }
            ?>
        </div>
    </div>

    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
        <a href="add_user.php" class="btn btn-success ms-2">Adicionar Usuário</a>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (isset($result) && $result && mysqli_num_rows($result) > 0) {
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user_data['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['senha']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['telefone']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['sexo']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['data_nasc']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['cidade']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['estado']) . "</td>";
                    echo "<td>" . htmlspecialchars($user_data['endereco']) . "</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=" . urlencode($user_data['id']) . "' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                        </a> 
                        <a class='btn btn-sm btn-danger' href='delete.php?id=" . urlencode($user_data['id']) . "' title='Deletar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                        </a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Nenhum usuário encontrado.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
