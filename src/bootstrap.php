<?php

/** ARCHIVO DE ARRANQUE  */

declare(strict_types=1);

// Ruta absoluta a la raíz del proyecto.
define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/autoloader.php';
require BASE_PATH . '/config/config.php';
