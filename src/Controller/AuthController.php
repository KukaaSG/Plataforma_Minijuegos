<?php

declare(strict_types=1);

namespace Controller;

use Core\Pages;

class AuthController
{
  private Pages $pages;

  public function __construct()
  {
    $this->pages = new Pages();
  }

  public function login(): void
  {
    $this->loadView("login");
  }

  public function registro(): void
  {
    $this->loadView("registro");
  }

  public function loadView(string $view): void
  {
    $this->pages->render($view);
  }
}
