<?php
// TODO: 
// Front Controller
// Cargar el resto de controladores con el front controller en vez de insertarlos al index directamente
// Crear css y diseñar páginas
// Crear el resto de vistas
declare(strict_types=1);

require __DIR__ . '/../autoloader.php';
require __DIR__ . '/../config/config.php';

use Controller\FrontController;

FrontController::main();
