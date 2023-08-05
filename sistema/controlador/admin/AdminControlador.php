<?php
namespace sistema\controlador\admin;

use sistema\shared\Controlador;

class AdminControlador extends Controlador {
    public function __construct() {
        parent::__construct("sistema/templates/admin/view");
    }
}
