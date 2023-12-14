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
  require_once('../../Model/TrabalhadorModel.php');
  require_once('../../Controller/TrabalhadorController.php');

  $trabalhadorController = new TrabalhadorController($conexao);

  if (isset($_GET['id'])) {
      $trabalhadorId = $_GET['id'];

      $trabalhador = $trabalhadorController->obterTrabalhadorPorId($trabalhadorId);

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
          $trabalhadorController->excluirTrabalhador($trabalhadorId);
          header("Location: ../../index.php");
          exit();
      }
  } else {
      echo "ID do trabalhador não fornecido.";
  }
?>

<main class="jumbotron">
    <h2 class="mt-3">Excluir trabalhador</h2>

    <form method="post">

    <div class="form-row">
        <div class="form-group col-md-6">
            <p>Você deseja realmente excluir o trabalhador <strong><?= $trabalhador['nome'] ?></strong>?</p>
        </div>
    </div>
        
    <div class="form-row">
        <div class="form-group col-md-6">
            <a href="../../index.php">
                <button type="button" class="btn btn-secondary">Cancelar</button>
            </a>

            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </div>
    </form>
</main>
