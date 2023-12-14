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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeTrabalhador = $_POST['nome'];
        $idCargoSelecionado = $_POST['cargo'];
        $turnoSelecionado = $_POST['turno'];

        $trabalhadorController->editarTrabalhador($trabalhadorId, $nomeTrabalhador, $idCargoSelecionado, $turnoSelecionado);
    }

    $trabalhador = $trabalhadorController->obterTrabalhadorPorId($trabalhadorId);

} else {
    echo "ID do trabalhador não fornecido.";
}
?>

<main class="jumbotron">
    <div class="main-content jumbotron" style="color: black">
        <h2>Editar Trabalhador</h2>

        <form method="post" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome do Trabalhador<span style="color:red">*</span>:</label>
                    <input type="text" id="nome" name="nome" value="<?= $trabalhador['nome']; ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="setor">Cargo<span style="color:red">*</span>:</label>
                    <select id="cargo" name="cargo" required>
                        <?php
                            $cargos = $trabalhadorController->listarCargos();
                            foreach ($cargos as $cargo) {
                                $selected = ($cargo['id'] == $cargo['cargoId']) ? 'selected' : '';
                                echo "<option value='{$cargo['id']}' $selected>{$cargo['nome']}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Turno<span style="color:red">*</span></label>
                    <select id="turno" name="turno" required>
                        <option value="" disable selected>Selecione</option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Integral">Integral</option>
                    </select>
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
