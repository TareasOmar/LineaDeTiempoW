<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $email;
    private $clave;
    private $error_nombre;
    private $error_email;
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $email, $clave1, $clave2, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";

        $this->error_nombre = $this->validarNombre($conexion, $nombre);
        $this->error_email = $this->validarEmail($conexion, $email);
        $this->error_clave1 = $this->validarClave1($clave1);
        $this->error_clave2 = $this->validarClave2($clave1, $clave2);
        
        if($this -> error_clave1 === "" && $this -> error_clave2 === ""){
            $this -> clave=$clave2;
        }
    }

    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validarNombre($conexion, $nombre) {
        if (!$this->variableIniciada($nombre)) {
            return "Debes escribir un nombre de usuario";
        } else {
            $this->nombre = $nombre;
        }

        if (strlen($nombre) < 6) {
            return "El nombre debe ser más largo de 6 caracteres";
        }

        if (strlen($nombre) > 24) {
            return "El nombre no puede tener más de 24 caracteres";
        }

        if (RepositorioUsuario :: nombreExiste($conexion, $nombre)) {
            return "Este nombre de usuario ya está en uso. Por favor, prueba otro nombre.";
        }

        return "";
    }

    private function validarEmail($conexion, $email) {
        if (!$this->variableIniciada($email)) {
            return "Debes proporcionar un email";
        } else {
            $this->email = $email;
        }

        if (RepositorioUsuario :: emailExiste($conexion, $email)) {
            return "Este email ya está en uso. Por favor, pruebe otro email o <a href='#'>intente recuperar su contraseña</a>";
        }

        return "";
    }

    private function validarClave1($clave1) {
        if (!$this->variableIniciada($clave1)) {
            return "Debes escribir una contraseña";
        }

        return "";
    }

    private function validarClave2($clave1, $clave2) {
        if (!$this->variableIniciada($clave1)) {
            return "Primero debes llenar el campo de contraseña";
        }

        if (!$this->variableIniciada($clave2)) {
            return "Debes repetir la contraseña";
        }

        if ($clave1 !== $clave2) {
            return "Las contraseñas deben coincidir";
        }

        return "";
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getErrorNombre() {
        return $this->error_nombre;
    }

    public function getErrorEmail() {
        return $this->error_email;
    }

    public function getErrorClave1() {
        return $this->error_clave1;
    }

    public function getErrorClave2() {
        return $this->error_clave2;
    }

    public function mostrarNombre() {
        if ($this->nombre !== '') {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrarEmail() {
        if ($this->email !== '') {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrarErrorNombre() {
        if ($this->error_nombre !== '') {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrarErrorEmail() {
        if ($this->error_email !== '') {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrarErrorClave1() {
        if ($this->error_clave1 !== '') {
            echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
        }
    }

    public function mostrarErrorClave2() {
        if ($this->error_clave2 !== '') {
            echo $this->aviso_inicio . $this->error_clave2 . $this->aviso_cierre;
        }
    }

    public function registroValido() {
        if ($this->error_nombre === '' &&
                $this->error_email === '' &&
                $this->error_clave1 === '' &&
                $this->error_clave2 === '') {
            return true;
        } else {
            return false;
        }
    }

}
