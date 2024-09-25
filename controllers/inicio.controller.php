<?php 
require_once "models/producto.php";
class InicioControlador
{
    private $modelo;
    public function __construct()
    {
        $this->modelo=new Producto();
    }
    public function Inicio()
    {
        require_once "views/encabezado.php";
        require_once "views/inicio/index.php";
        require_once "views/pie.php";
    }
}