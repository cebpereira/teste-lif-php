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
    require_once('../../Model/CargoModel.php');
    require_once('../../Controller/CargoController.php');

    $cargoController = new CargoController($conexao);
    $setores = $cargoController->listarSetores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeCargo = $_POST['nome'];
        $idSetorSelecionado = $_POST['setor'];
    
        $cargoController->adicionarCargo($nomeCargo, $idSetorSelecionado);
    }
?>

<main class="jumbotron">
    <div class="main-content jumbotron text-dark">
        <h2>Criar novo Cargo</h2>
        <div class="col-sm-8">
            (<span style="color: red;">*</span>) Campos Obrigatórios<br>
        </div>
        <hr>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome do Cargo<span style="color:red">*</span>:</label>
                    <input type="text" autocomplete="off" id="nome" name="nome" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Setor<span style="color:red">*</span>:</label>
                    <select class="setor" name="setor" required>
                        <option value="" disable selected>Selecione</option>
                        <?php foreach ($setores as $setor): ?>
                            <option value="<?= $setor['id']; ?>"><?= $setor['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <a href="/index.php" class="btn btn-secondary float-left"><i
                        class="fas fa-arrow-left"></i>&nbsp&nbspVoltar</a>

                    <button type="submit" class="btn btn-primary ml-2">
                        <i class='fas fa-check'></i>&nbsp&nbspSalvar</button>
                </div>
            </div>
        </form>
    </div>
</main>