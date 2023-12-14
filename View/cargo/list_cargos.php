<?php
    require_once('db_config.php');
    require_once('Model/CargoModel.php');
    require_once('Controller/CargoController.php');

    $cargoController = new CargoController($conexao);
    $cargos = $cargoController->listarCargos();
?>

<main class="jumbotron">
    <div class="main-content jumbotron" style="color: black">
        <h2>Listar Cargos</h2>

        <section class="mt-3">
            <a href="View/cargo/create_cargo.php">
                <button type="button" class="btn btn-primary"><span class="fas fa-plus"></span>&nbsp;&nbsp;Novo Cargo</button>
            </a>
        </section>

        <section>
            <table class="table table-bordered bg-light mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cargos as $cargo): ?>
                        <tr>
                            <td><?= $cargo['id']; ?></td>
                            <td><?= $cargo['nome']; ?></td>
                            <td><?= $cargo['setorId']; ?></td>
                            <td>
                                <a href="View/cargo/edit_cargo.php?id=<?= $cargo['id']; ?>">
                                    <button type="button" class="btn btn-secondary">Editar</button>
                                </a>

                                <a href="View/cargo/delete_cargo.php?id=<?= $cargo['id']; ?>">
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
