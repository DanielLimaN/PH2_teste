<?php


class Validacao extends Exception {

    private $errors = null;

    public function __construct($errors) {
        parent::__construct("Falha ao validar!");
        $this->errors = $errors;
    }


    public function getErrors() {
        return $this->errors;
    }

}

?>
