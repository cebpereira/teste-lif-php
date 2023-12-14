<?php

class TrabalhadorModel {
    private $id;
    private $nome;
    private $cargoId;
    private $turno;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCargoId() {
        return $this->cargoId;
    }

    public function setCargoId($cargoId) {
        $this->cargoId = $cargoId;
    }

    public function getTurno() {
        return $this->turno;
    }

    public function setTurno($turno) {
        $this->turno = $turno;
    }
}
