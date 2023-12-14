<?php

class SetorController {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function adicionarSetor($nome) {
        if (empty($nome)) {
            echo "Nome do setor não pode ser vazio.";
            return;
        }

        $setorModel = new SetorModel();

        $setorModel->setNome($nome);

        $setorAdicionado = $this->adicionarSetorNoBanco($setorModel);

        if ($setorAdicionado) {
            echo "Setor adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar setor.";
        }
    }

    private function adicionarSetorNoBanco($setorModel) {
        $nome = $setorModel->getNome();

        $query = "INSERT INTO Setores (nome) VALUES (?)";
        $stmt = mysqli_prepare($this->conexao, $query);

        mysqli_stmt_bind_param($stmt, "s", $nome);

        $setorAdicionado = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $setorAdicionado;
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

    private function recuperarSetoresDoBanco() {
        $query = "SELECT id, nome FROM Setores";
        $result = mysqli_query($this->conexao, $query);

        $setores = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $setores[] = $row;
        }

        return $setores;
    }


    public function obterSetorPorId($setorId) {
        $query = "SELECT id, nome FROM Setores WHERE id = $setorId";
        $result = mysqli_query($this->conexao, $query);

        if ($result) {
            $setor = mysqli_fetch_assoc($result);
            return $setor;
        } else {
            return null;
        }
    }

    public function editarSetor($setorId, $nomeSetor) {
        $setorEditado = $this->editarSetorNoBanco($setorId, $nomeSetor);

        if ($setorEditado) {
            echo "Setor editado com sucesso.";
        } else {
            echo "Erro ao editar setor.";
        }
    }

    private function editarSetorNoBanco($setorId, $novoNomeSetor) {
        $query = "UPDATE Setores SET nome = '$novoNomeSetor' WHERE id = $setorId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }

    private function verificarCargosNoSetor($setorId) {
        $query = "SELECT COUNT(*) as count FROM Cargos WHERE setorId = $setorId";
        $result = mysqli_query($this->conexao, $query);
        $row = mysqli_fetch_assoc($result);

        return $row['count'] > 0;
    }

    public function excluirSetor($setorId) {
        $setorExcluido = $this->excluirSetorNoBanco($setorId);

        if ($setorExcluido) {
            echo "Setor excluído com sucesso.";
        } else {
            echo "Erro ao excluir setor.";
        }
    }

    private function excluirSetorNoBanco($setorId) {
        $query = "DELETE FROM Setores WHERE id = $setorId";
        $result = mysqli_query($this->conexao, $query);

        return $result;
    }
}
