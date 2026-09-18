<?php
session_start();

include "app/cons.php";
require_once "app/DLL.php";

$login = $_SESSION["login"] ?? "Usuário";
$carrinho = $_SESSION["carrinho"] ?? [];

$total = 0;

foreach ($carrinho as $item) {
    $total += $item["preco"];
}

$pagamento = $_SESSION["pagamento"] ?? "Cartão";
$dataHora = date("Y-m-d H:i:s");

$consulta = "INSERT INTO vendas (Usuario, Total, Pagamento, DataHora) VALUES ('$login', '$total', '$pagamento', '$dataHora')";

$resultado = banco($server, $user, $password, $db, $consulta);

foreach ($carrinho as $item) {

    $produto = $item["produto"];
    $preco = $item["preco"];

    $consulta = "INSERT INTO itens_venda (Usuario, Produto, Preco) VALUES ('$login', '$produto', '$preco')";

    $resultado = banco($server, $user, $password, $db, $consulta);
}

unset($_SESSION["carrinho"]);

echo "<script>
alert('Compra finalizada com sucesso!');
window.location.href='index.php';
</script>";

?>