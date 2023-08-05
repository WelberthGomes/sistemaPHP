<?php

namespace sistema\shared;

use sistema\suport\Template;

class Controlador {

    protected Template $template;

    public function __construct(string $diretorio) {
        $this->template = new Template($diretorio);
    }

}
