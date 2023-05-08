<?php

namespace sistema\shared;

class Mensagem {

    private $texto;

    public function __construct($texto) {
        $this->texto = $texto;
    }

    public function sucesso(): string {
        return $this->filtrar("alert alert-success");
    }
    
    public function alerta(): string {
        return $this->filtrar("alert alert-warning");
    }
    
    public function informa(): string {
        return $this->filtrar("alert alert-primary");
    }
    
    public function erro(): string {
        return $this->filtrar("alert alert-danger");
    }

    private function filtrar(string $css): string {
        $mensagem = filter_var($this->texto, FILTER_SANITIZE_SPECIAL_CHARS);
        return "<div class='{$css}'>{$mensagem}</div>";
    }

}
