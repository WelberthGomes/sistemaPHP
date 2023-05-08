<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
require_once 'configuracao.php';
require_once 'util\Util.php';
require_once 'shared\Mensagem.php';
require_once 'shared\Controlador.php';

use sistema\util\Util;
use sistema\shared\Controlador;

echo Util::fomataNumero(10000);
new Controlador;