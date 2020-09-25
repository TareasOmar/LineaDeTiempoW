<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($email, $clave, $conexion) {
        $this->error = "";
        if (!$this->variableIniciada($email) || !$this->variableIniciada($clave)) {
            $this->usuario = null;
            $this->error = "Debes introducir tu email y contraseña";
        } else {
            $this->usuario = RepositorioUsuario::obtenerUsuarioPorEmail($conexion, $email);

            if (is_null($this->usuario) || /*!($clave==$this->usuario->getPassword())*/!password_verify($clave, $this->usuario->getPassword())){
                $this -> error = "Datos incorrectos ";
            }
        }
    }   
    
    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getError() {
        return $this->error;
    }

    public function mostrarError() {
        if ($this->error !== '') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }

}
