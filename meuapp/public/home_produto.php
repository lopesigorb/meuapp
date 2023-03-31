<?php

require_once('./header.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/acoes/verifica_sessao.php');
require_once(str_replace('\\', '/', dirname(__FILE__, 2)) .'/controllers/produto.controller.php');

$controller = new ProdutoController();
$produtos = $controller->buscarTodos();

?>
<div class="container">
    <?php require_once('nav.php'); ?>

    <h1>Lista de produtos</h1>
    <a class="btn btn-primary" href="cad_produto.php">Novo produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Código de barras</th>
                <th scope="col">Estoque</th>
                <th scope="col">Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produtos as $c) :
            ?>
                <tr>
                    <td><?= $c->getId(); ?></td>
                    <td><?= $c->getNome(); ?></td>
                    <td><?= $c->getDescricao(); ?></td>
                    <td><?= $c->getCodigo_barras(); ?></td>
                    <td><?= $c->getQtde_estoque(); ?></td>
                    <td><?= $c->getAtivo(); ?></td>
                    <td>
                        <a class="btn btn-light" href="cad_produto.php?key=<?=$c->getId()?>">Editar</a>
                        <a class="btn btn-link" href="../acoes/apagar_produto.php?key=<?=$c->getId()?>">Excluir</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <?php
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == TRUE) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    if (isset($_SESSION) && isset($_SESSION['sucesso']) && $_SESSION['sucesso'] == false) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['mensagem']; ?>
        </div>
    <?php
    }
    unset($_SESSION['sucesso'], $_SESSION['mensagem']);
    ?>

</div>

<?php
require_once('./footer.php');
