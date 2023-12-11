<?php

namespace Model;

use Model\ActiveRecord;

class Servicio extends ActiveRecord
{
    //BASE DE DATOS
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }
    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = "EL NOMBRE DEL SERVICIO ES OBLIGATORIO";
        }
        if (!$this->precio) {
            self::$alertas['error'][] = "EL PRECIO DEL SERVICIO ES OBLIGATORIO";
        }
        if (!is_numeric($this->precio)) {
            self::$alertas['error'][] = "EL PRECIO NO ES VALIDO";
        }
        return self::$alertas;
    }
}
