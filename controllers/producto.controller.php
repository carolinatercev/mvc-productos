<?php 
require_once "models/producto.php";

class ProductoControlador{
    private $modelo;
    
    public function __construct(){
        $this->modelo = new Producto();
    }
    
    public function Inicio(){
        require_once "views/encabezado.php";
        require_once "views/producto/index.php";
        require_once "views/pie.php";

    }
    /******CREAR PRODUCTO****** */
    public function CrearProd(){
        $titulo="Registrar";
        $p=new Producto();
        if(isset($_GET['id'])){
          
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="Actualizar";

        }
        require_once "views/encabezado.php";
        require_once "views/producto/crear.php";
        require_once "views/pie.php";
}
/******GUARDAR PRODUCTO ** */
public function Guardar()
{
    $p=new Producto();
    $p->setProd_id(intval($_POST['idProd'])); //esto no porque se autoincrementa solo// intval hace que obtenga el valor en entero de una variable  
    $p->setProd_nombre($_POST['nombre']);
    $p->setProd_marca($_POST['marca']);
    $p->setProd_costo($_POST['costo']);
    $p->setProd_precio($_POST['precio']);
    $p->setProd_cantidad($_POST['cantidad']);
    $p->setProd_imagen($_POST['imagen']);

    //Si el id esta vacio es porque es un nuevo producto
    $p->getProd_id() > 0
    ? $this->modelo->Actualizar($p)
    : $this->modelo->Insertar($p);
 
    header ("Location: index.php?c=producto");
}

/******BORRAR PRODUCTO ** */

public function Borrar()
{
    $this->modelo->Eliminar($_GET['id']); // con GET tiene que recogerse si os i con el id , y no asi con el idProd como en POST.
    header("Location: index.php?c=producto");
 }
}