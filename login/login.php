<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .inputSubmit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .inputSubmit:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
        /* Estilo para o botão de voltar */
        .back-button {
       display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: Crimson; /* Cor de fundo do botão */
    border: 2px solid Crimson; /* Cor da borda do botão */
    border-radius: 5px; /* Cantos arredondados */
    transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Transição suave */
    cursor: pointer;
}

.back-button:hover {
    background-color: #0056b3; /* Cor de fundo ao passar o mouse */
    border-color: #0056b3; /* Cor da borda ao passar o mouse */
    color: #fff; /* Cor do texto ao passar o mouse */
}

.back-button:active {
    background-color: #004494; /* Cor de fundo ao clicar */
    border-color: #004494; /* Cor da borda ao clicar */
}

    </style>
</head>
<body>
    <a href="home.php" class="back-button">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>