<?php
    require_once('db_config.php');
    require_once('Model/TrabalhadorModel.php');
    require_once('Controller/TrabalhadorController.php');

    $trabalhadorController = new TrabalhadorController($conexao);
    $trabalhadores = $trabalhadorController->listarTrabalhadores();
?>

<main class="jumbotron">
    <div class="main-content jumbotron" style="color: black">
        <h2>Listar Trabalhadores</h2>

        <section class="mt-3">
            <a href="View/trabalhador/create_trabalhador.php">
                <button type="button" class="btn btn-primary"><span class="fas fa-plus"></span>&nbsp;&nbsp;Novo Trabalhador</button>
            </a>
        </section>

        <section>
            <table class="table table-bordered bg-light mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Turno</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trabalhadores as $trabalhador): ?>
                        <tr>
                            <td><?= $trabalhador['id']; ?></td>
                            <td><?= $trabalhador['nome']; ?></td>
                            <td><?= $trabalhador['cargoId']; ?></td>
                            <td><?= $trabalhador['turno']; ?></td>
                            <td>
                                <a href="View/trabalhador/edit_trabalhador.php?id=<?= $trabalhador['id']; ?>">
                                    <button type="button" class="btn btn-secondary">Editar</button>
                                </a>

                                <a href="View/trabalhador/delete_trabalhador.php?id=<?= $trabalhador['id']; ?>">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</main>
