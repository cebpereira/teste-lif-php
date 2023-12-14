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
    require_once('../../db_config.php');
    require_once('../../Model/SetorModel.php');
    require_once('../../Controller/SetorController.php');

    $setorController = new SetorController($conexao);

    if (isset($_GET['id'])) {
        $setorId = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeSetor = $_POST['nome'];

            $setorController->editarSetor($setorId, $nomeSetor);
        }

        $setor = $setorController->obterSetorPorId($setorId);
    } else {
        echo "ID do setor não fornecido.";
    }
?>

<main class="jumbotron">
    <div class="main-content jumbotron" style="color: black">
        <h2>Editar Setor</h2>

        <form method="post" class="mt-3">
            <label for="nome">Nome do Setor:</label>
            <input type="text" id="nome" name="nome" value="<?= $setor['nome']; ?>" required>

            <div class="form-row mt-3">
                <a href="/index.php" class="btn btn-secondary float-left"><i
                    class="fas fa-arrow-left"></i>&nbsp&nbspVoltar</a>

                <button type="submit" class="btn btn-primary ml-2">
                    <i class='fas fa-check'></i>&nbsp&nbspSalvar</button>
            </div>
        </form>

        <br>
        
    </div>
</main>
