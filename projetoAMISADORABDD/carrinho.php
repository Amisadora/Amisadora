<?php
session_start();

if (!isset($_SESSION["carrinho"])) {
    $_SESSION["carrinho"] = [];
}


if (isset($_GET["produto"]) && isset($_GET["preco"])) {

    $produto = $_GET["produto"];
    $preco = (float) $_GET["preco"]; 

    $_SESSION["carrinho"][] = [
        "produto" => $produto,
        "preco" => $preco
    ];

    header("Location: carrinho.php");
    exit;
}

if (isset($_GET["remover"])) {

    $index = (int) $_GET["remover"];

    unset($_SESSION["carrinho"][$index]);

    $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);

    header("Location: carrinho.php");
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
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

<main class="carrinho-container">

    <h2>Seu Carrinho</h2>

    <?php if (empty($_SESSION["carrinho"])): ?>

        <p>Seu carrinho está vazio.</p>

    <?php else: ?>

        <?php
        $total = 0;

        foreach ($_SESSION["carrinho"] as $index => $item):

            $total += $item["preco"];
        ?>

            <div class="item">
                <p><?= $item["produto"] ?> - R$ <?= number_format($item["preco"], 2, ',', '.') ?></p>

                <a href="carrinho.php?remover=<?= $index ?>">Remover</a>
            </div>

        <?php endforeach; ?>

        <hr>

        <h3>Total: R$ <?= number_format($total, 2, ',', '.') ?></h3>

        <a href="confirmacao_compra.php">
            <button>Finalizar Compra</button>
        </a>

    <?php endif; ?>

</main>

<?php include "footer.php"; ?>

</body>
</html>