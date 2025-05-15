<?php
class Comida {
    public $comida;
    public $tipo;
    public $descripcion;

    function set_comida($comida) {
        $this->comida = $comida;
    }

    function get_comida() {
        return $this->comida;
    }

    function set_tipo($tipo) {
        $this->tipo = $tipo;
    }

    function get_tipo() {
        return $this->tipo;
    }

    function set_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function get_descripcion() {
        return $this->descripcion;
    }
}
?>