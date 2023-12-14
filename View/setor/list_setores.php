<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css" 
      integrity="sha512-BxQjx52Ea/sanKjJ426PAhxQJ4BPfahiSb/ohtZ2Ipgrc5wyaTSgTwPhhZ/xC66vvg+N4qoDD1j0VcJAqBTjhQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
</html>

<?php
    require_once('db_config.php');
    require_once('Model/SetorModel.php');
    require_once('Controller/SetorController.php');

    $setorController = new SetorController($conexao);
    $setores = $setorController->listarSetores();
?>

<main class="jumbotron">
    <div class="main-content jumbotron" style="color: black">
        <h2>Listar Setores</h2>

        <section class="mt-3">
            <a href="View/setor/create_setor.php">
                <button type="button" class="btn btn-primary"><span class="fas fa-plus"></span>&nbsp;&nbsp;Novo Setor</button>
            </a>
        </section>

        <section>
            <table class="table table-bordered bg-light mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($setores as $setor): ?>
                        <tr>
                            <td><?= $setor['id']; ?></td>
                            <td><?= $setor['nome']; ?></td>
                            <td>
                                <a href="View/setor/edit_setor.php?id=<?= $setor['id']; ?>">
                                    <button type="button" class="btn btn-secondary">Editar</button>
                                </a>

                                <a href="View/setor/delete_setor.php?id=<?= $setor['id']; ?>">
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
