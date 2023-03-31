<?php

session_start();

require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . '/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/classes/produto.class.php");
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) . "/controllers/produto.controller.php");

$cliente = new Produto();

if (isset($_GET) && isset($_GET['key'])) {
    $id         = addslashes(filter_input(INPUT_GET, 'key'));
    $controller = new ProdutoController();
    $resultado = $controller->removerProduto($id);

    if ($resultado) {
        $_SESSION['mensagem'] = "Produto excluido com sucesso";
        $_SESSION['sucesso'] = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir";
        $_SESSION['sucesso'] = false;
    }

    header('Location:../public/home_produto.php');
}
