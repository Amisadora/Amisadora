<?php
session_start();

$login = $_SESSION["login"] ?? "Usuário não logado";

$carrinho = $_SESSION["carrinho"] ?? [];
$total = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $_SESSION["pagamento"] = $_POST["pagamento"] ?? "";

    $_SESSION["cartao"] = [
        "nome" => $_POST["nome_cartao"] ?? "",
        "numero" => $_POST["numero_cartao"] ?? "",
        "validade" => $_POST["validade"] ?? "",
        "cvv" => $_POST["cvv"] ?? ""
    ];

    if ($_SESSION["pagamento"] == "Pix") {
        header("Location: pix.php");
        exit;
    }

    if ($_SESSION["pagamento"] == "Boleto") {
        header("Location: boleto.php");
        exit;
    }

    header("Location: finalizar_compra.php");
    exit;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Compra</title>
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

<main class="confirmacao-container">

    <div class="confirmacao-box">

        <h2>Confirmação de Compra</h2>

        <p><strong>Usuário:</strong> <?= $login ?></p>

        <hr>

        <h3>Produtos:</h3>

        <?php if (empty($carrinho)): ?>

            <p>Seu carrinho está vazio.</p>

        <?php else: ?>

            <?php foreach ($carrinho as $item): ?>
                <p><?= $item["produto"] ?> - R$ <?= number_format($item["preco"], 2, ',', '.') ?></p>
                <?php $total += $item["preco"]; ?>
            <?php endforeach; ?>

            <hr>

            <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>

        <?php endif; ?>

        <form method="POST" class="form-pagamento">

            <label>Forma de pagamento:</label>

            <select name="pagamento" required>
                <option value="Cartão">Cartão de Crédito</option>
                <option value="Pix">Pix</option>
                <option value="Boleto">Boleto</option>
            </select>

            <div class="cartao">

                <h4>Dados do Cartão</h4>

                <input type="text" name="nome_cartao" placeholder="Nome no cartão">
                <input type="text" name="numero_cartao" placeholder="Número do cartão" maxlength="19">
                <input type="text" name="validade" placeholder="MM/AA" maxlength="5">
                <input type="text" name="cvv" placeholder="CVV" maxlength="4">

            </div>

            <button type="submit">Confirmar Compra</button>

        </form>

    </div>

</main>

<?php include "footer.php"; ?>

</body>
</html>