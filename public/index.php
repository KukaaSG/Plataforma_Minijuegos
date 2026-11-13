<?php

declare(strict_types=1);

require __DIR__ . '/../autoloader.php';

use Controller\HomeController;

$homeC = new HomeController();
$homeC->index();
