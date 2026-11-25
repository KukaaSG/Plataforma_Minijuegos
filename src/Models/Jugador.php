<?php
declare(strict_types=1);

namespace Models;

class Jugador{
    private string $ruta;

    // Para utilizar el modelo se le tiene que pasar la ruta de donde se guardan los usuarios.
    function __construct(string $ruta){
        $this->ruta = $ruta;
    }

    // Devuelve todos los jugadores
    public function todos(): array
    {
        //Si el fichero no existe o está vacío, devuelve [].
        if (!file_exists($this->ruta)) {
            return [];
        }

        $json = file_get_contents($this->ruta);
        if ($json === false || trim($json) === '') {
            return [];
        }

        //Si el JSON está corrupto lanza JsonException que lo captura el FrontController como error 500.
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    // Comprueba si el nombre de usuario ya existe
    public function existeUsername(string $username): bool
    {
        $buscado = mb_strtolower($username);

        foreach ($this->todos() as $jugador) {
            if (mb_strtolower($jugador['username']) === $buscado) {
                return true;
            }
        }
        return false;
    }

    // Comprueba si el correo ya existe
    public function existeEmail(string $email): bool
    {
        $buscado = mb_strtolower($email);

        foreach ($this->todos() as $jugador) {
            if (mb_strtolower($jugador['email']) === $buscado) {
                return true;
            }
        }
        return false;
    }

    // Guarda un nuevo jugador con la contraseña cifrada.
    public function crear(string $username, string $email, string $password): void
    {
        // Crea la carpeta data/ si no existe
        $carpeta = dirname($this->ruta);
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }

        $jugadores = $this->todos();

        $jugadores[] = [
            'username' => $username,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        file_put_contents(
            $this->ruta,
            json_encode($jugadores, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        );
    }

    // Busca al jugador por correo y comprueba la contraseña. Devuelve los datos del jugador si todo es correcto, y si no lo es, devuelve null.
    public function verificarCredenciales(string $email, string $password): ?array
    {
        $buscado = mb_strtolower($email);

        foreach ($this->todos() as $jugador) {
            if (mb_strtolower($jugador['email']) === $buscado) {
                if (password_verify($password, $jugador['password'])) {
                    return $jugador;
                }
                return null;
            }
        }
        return null;
    }
}