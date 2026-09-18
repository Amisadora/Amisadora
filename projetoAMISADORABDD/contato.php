<?php
session_start();

include "app/cons.php";
require_once "app/banco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $mensagem = $_POST["mensagem"] ?? "";

    $consulta = "INSERT INTO contatos (Nome, Email, Mensagem) VALUES ('$nome', '$email', '$mensagem')";

    $resultado = banco($server, $user, $password, $db, $consulta);

    echo "<script>alert('Mensagem enviada com sucesso!');</script>";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Contato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="header">
    <img src="img/header.png" alt="Header da Loja">
</header>

<nav class="menu">
    <a href="index.php">Início</a>
    <a href="login.php">Login</a>
    <a href="contato.php">Contato</a>
    <a href="carrinho.php">Carrinho</a>
</nav>

<main class="contato-container">

    <div class="contato-box">

        <h2>Contato</h2>

        <form method="POST">

            <input type="text" name="nome" placeholder="Seu nome" required>
            <input type="email" name="email" placeholder="Seu e-mail" required>
            <textarea name="mensagem" placeholder="Sua mensagem" required></textarea>

            <button type="submit">Enviar</button>

        </form>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>