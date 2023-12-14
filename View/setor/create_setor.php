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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeSetor = $_POST['nome'];

        $setorController->adicionarSetor($nomeSetor);
    }
?>

<main class="jumbotron">
    <div class="main-content jumbotron text-dark">
        <h2>Criar novo setor</h2>
        <div class="col-sm-8">
            (<span style="color: red;">*</span>) Campos Obrigatórios<br>
        </div>
        <hr>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome do Setor<span style="color:red">*</span></label>
                    <input type="text" autocomplete="off" id="nome" name="nome" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <a href="/index.php" class="btn btn-secondary float-left"><i
                    class="fas fa-arrow-left"></i>&nbsp&nbspVoltar</a>

                <button type="submit" class="btn btn-primary ml-2">
                    <i class='fas fa-check'></i>&nbsp&nbspSalvar</button>
            </div>
            
        </form>
    </div>
</main>  