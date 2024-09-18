<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE | GDU</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background: #003366;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #ffffff;
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            margin: 0 15px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #0099cc;
        }
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        .content img {
            width: 120px;
            margin-bottom: 20px;
        }
        .content h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: white;
        }
        .content a {
            display: block;
            text-decoration: none;
            color: #ffffff;
            background: #007bff;
            border-radius: 5px;
            padding: 12px;
            margin: 10px 0;
            transition: background 0.3s;
        }
        .content a:hover {
            background: #0056b3;
        }
        footer {
            background: #003366;
            padding: 15px;
            text-align: center;
            color: #ffffff;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>GDU</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="about.php">Sobre</a>
            <a href="contact.php">Contato</a>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <img src="imagens/user.png" alt="Logo">
            <h1>Bem-vindo ao GDU</h1>
            <a href="login.php">Login</a>
            <a href="formulario.php">Cadastre-se</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 GDU. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
