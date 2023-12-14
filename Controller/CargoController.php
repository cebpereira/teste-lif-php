<?php

require_once('SetorController.php');

class CargoController {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function adicionarCargo($nome, $setorId) {
        if (empty($nome)) {
            echo "Nome do cargo não pode ser vazio.";
            return;
        }
        
        $cargoModel = new CargoModel();

        $setor = $this->obterSetorPorId($setorId);

        $cargoModel->setNome($nome);
        $cargoModel->setSetorId($setorId);

        $cargoAdicionado = $this->adicionarCargoNoBanco($cargoModel, $nome, $setor);

        if ($cargoAdicionado) {
            echo "Cargo adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar cargo.";
        }
    }

    private function adicionarCargoNoBanco($cargoModel, $nome, $setor) {
        $nome = $cargoModel->getNome();
        $setorId = $cargoModel->getSetorId();

        $nomeSetor = $setor['nome'];

        $query = "INSERT INTO Cargos (nome, setorId) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conexao, $query);

        mysqli_stmt_bind_param($stmt, "ss", $nome, $setorId);

        $cargoAdicionado = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $cargoAdicionado;
    }

    public function listarSetores() {
        $query = "SELECT id, nome FROM Setores";
        $result = mysqli_query($this->conexao, $query);

        $setores = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $setores[] = $row;
        }

        return $setores;
    }

    public function obterSetorPorId($setorId) {
        $setorController = new SetorController($this->conexao);

        return $setorController->obterSetorPorId($setorId);
    }

    public function obterCargoPorId($cargoId) {
        $query = "SELECT id, nome, setorId FROM Cargos WHERE id = $cargoId";
        $result = mysqli_query($this->conexao, $query);

        if ($result) {
            $cargo = mysqli_fetch_assoc($result);
            return $cargo;
        } else {
            return null;
        }
    }

    public function editarCargo($cargoId, $nomeCargo, $setorId) {
        $cargoEditado = $this->editarCargoNoBanco($cargoId, $nomeCargo, $setorId);

        if ($cargoEditado) {
            echo "Cargo editado com sucesso.";
        } else {
            echo "Erro ao editar cargo.";
        }
    }

    private function editarCargoNoBanco($cargoId, $nomeCargo, $setorId) {
        $query = "UPDATE Cargos SET nome = '$nomeCargo', setorId = '$setorId' WHERE id = $cargoId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }

    private function verificarTrabalhadoresNoCargo($cargoId) {
        $query = "SELECT COUNT(*) as count FROM Trabalhadores WHERE cargoId = $cargoId";
        $result = mysqli_query($this->conexao, $query);
        $row = mysqli_fetch_assoc($result);

        return $row['count'] > 0;
    }

    public function excluirCargo($cargoId) {
        $cargoExcluido = $this->excluirCargoNoBanco($cargoId);

        if ($cargoExcluido) {
            echo "Cargo excluído com sucesso.";
        } else {
            echo "Erro ao excluir cargo.";
        }
    }

    private function excluirCargoNoBanco($cargoId) {
        $query = "DELETE FROM Cargos WHERE id = $cargoId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }

    public function listarCargos() {
        $query = "SELECT id, nome, setorId FROM Cargos";
        $result = mysqli_query($this->conexao, $query);

        $cargos = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $cargos[] = $row;
        }

        return $cargos;
    }
}
