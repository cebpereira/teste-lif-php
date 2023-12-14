<?php

require_once('CargoController.php');

class TrabalhadorController {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function adicionarTrabalhador($nome, $cargoId, $turno) {
        if (empty($nome)) {
            echo "Nome do trabalhador não pode ser vazio.";
            return;
        }
        
        $trabalhadorModel = new TrabalhadorModel();

        $cargo = $this->obterCargoPorId($cargoId);

        $trabalhadorModel->setNome($nome);
        $trabalhadorModel->setCargoId($cargoId);
        $trabalhadorModel->setTurno($turno);

        $trabalhadorAdicionado = $this->adicionarTrabalhadorNoBanco($trabalhadorModel, $nome, $cargo, $turno);

        if ($trabalhadorAdicionado) {
            echo "Trabalhador adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar trabalhador.";
        }
    }

    private function adicionarTrabalhadorNoBanco($trabalhadorModel, $nome, $cargo, $turno) {
        $nome = $trabalhadorModel->getNome();
        $cargoId = $trabalhadorModel->getCargoId();

        $nomeCargo = $cargo['nome'];

        $query = "INSERT INTO Trabalhadores (nome, cargoId, turno) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conexao, $query);

        mysqli_stmt_bind_param($stmt, "sss", $nome, $setorId, $turno);

        $trabalhadorAdicionado = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $trabalhadorAdicionado;
    }

    public function listarCargos() {
        $query = "SELECT id, nome FROM Cargos";
        $result = mysqli_query($this->conexao, $query);

        $cargos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $cargos[] = $row;
        }

        return $cargos;
    }

    public function obterCargoPorId($cargoId) {
        $cargoController = new CargoController($this->conexao);

        return $cargoController->obterCargoPorId($cargoId);
    }

    public function obterTrabalhadorPorId($trabalhadorId) {
        $query = "SELECT id, nome, cargoId, turno FROM Trabalhadores WHERE id = $trabalhadorId";
        $result = mysqli_query($this->conexao, $query);

        if ($result) {
            $trabalhador = mysqli_fetch_assoc($result);
            return $trabalhador;
        } else {
            return null;
        }
    }

    public function editarTrabalhador($trabalhadorId, $nomeTrabalhador, $cargoId, $turnoSelecionado) {
        $trabalhadorEditado = $this->editarTrabalhadorNoBanco($trabalhadorId, $nomeTrabalhador, $cargoId, $turnoSelecionado);

        if ($trabalhadorEditado) {
            echo "Trabalhador editado com sucesso.";
        } else {
            echo "Erro ao editar cargo.";
        }
    }

    private function editarTrabalhadorNoBanco($trabalhadorId, $nomeTrabalhador, $cargoId, $turnoSelecionado) {
        $query = "UPDATE Trabalhadores SET nome = '$nomeTrabalhador', cargoId = '$cargoId', turno = '$turnoSelecionado' WHERE id = $trabalhadorId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }

    public function excluirTrabalhador($trabalhadorId) {
        $trabalhadorExcluido = $this->excluirTrabalhadorNoBanco($trabalhadorId);

        if ($trabalhadorExcluido) {
            echo "Trabalhador excluído com sucesso.";
        } else {
            echo "Erro ao excluir trabalhador.";
        }
    }

    private function excluirTrabalhadorNoBanco($trabalhadorId) {
        $query = "DELETE FROM Trabalhadores WHERE id = $trabalhadorId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }

    public function listarTrabalhadores() {
        $query = "SELECT id, nome, cargoId, turno FROM Trabalhadores";
        $result = mysqli_query($this->conexao, $query);

        $trabalhadores = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $trabalhadores[] = $row;
        }

        return $trabalhadores;
    }
}
