<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Erro de Login</title>
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

<main class="login-container">

    <div class="login-box">

        <h2>Erro de Login</h2>
        <p>Login ou senha inválidos.</p>

        <a href="login.php">Tentar novamente</a>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>