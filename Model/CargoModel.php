<?php

class CargoModel {
    private $id;
    private $nome;
    private $setorId;

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

    public function getSetorId() {
        return $this->setorId;
    }

    public function setSetorId($setorId) {
        $this->setorId = $setorId;
    }
}
