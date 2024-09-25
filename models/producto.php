<?php
require_once "db.php";

class Producto
{
    private $pdo;

    private $prod_id;
    private $prod_nombre;
    private $prod_marca;
    private $prod_costo;
    private $prod_precio;
    private $prod_cantidad;
    private $prod_imagen;

    public function __construct()
    {

        $this->pdo = DataBase::Conectar(); // con esto hice la conexion con la base de datos,ese Conectar()viene de la funcion  en db.php 
    }

    /*METODOS GETTER Y SETTERS*/
    //ID 
    public function getProd_id(): ?int // CON ESTO ESTOY DICIENDO que la funcion me devuelva un entero un int.
    {
        return $this->prod_id;
    }
    public function setProd_id(int $id)
    {
        $this->prod_id = $id;
    }
    //NOMBRE
    public function getProd_nombre(): ?string
    {
        return $this->prod_nombre;
    }
    public function setProd_nombre(string $nombre)
    {
        $this->prod_nombre = $nombre;
    }
    //MARCA
    public function getProd_marca(): ?string
    {
        return $this->prod_marca;
    }
    public function setProd_marca(string $marca)
    {
        $this->prod_marca = $marca;
    }
    //COSTO
    public function getProd_costo(): ?float
    {
        return $this->prod_costo;
    }
    public function setProd_costo(float $costo)
    {
        $this->prod_costo = $costo;
    }
    //PRECIO
    public function getProd_precio(): ?float
    {
        return $this->prod_precio;
    }
    public function setProd_precio(float $precio)
    {
        $this->prod_precio = $precio;
    }
    //CANTIDAD
    public function getProd_cantidad(): ?int
    {
        return $this->prod_cantidad;
    }
    public function setProd_cantidad(int $cantidad)
    {
        $this->prod_cantidad = $cantidad;
    }
    //IMAGEN
    public function getProd_imagen(): ?string
    {
        return $this->prod_imagen;
    }
    public function setProd_imagen(string $imagen)
    {
        $this->prod_imagen = $imagen;
    }




    /******************************************************************  */
    /***********AHORA VAMOS A CREAR OTROS METODOS   *** */
    /***METODO CANTIDAD     */
    public function Cantidad()
    {
        try {
            $sql = "SELECT SUM(cantidad) as Cantidad FROM productos;";

            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ); // ACA DIGO QUE ME DEVUELVA UN OBJETO DE LA CANTIDAD

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /***METODO LISTAR PRODUCTOS ****/
    public function Listar()
    {
        try {
            $sql = "SELECT * FROM productos;";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ); // FETCH ALL , PORQUE ACA QUE REMOS TODOS LOS PORODUCTOS // ACA DIGO QUE ME DEVUELVA UN ARRAY DE OBJETOS CON TODOS LOS PRODUCTOS
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /***METODO PARA INSERTAR PRODUCTOS ****/
    public function Insertar(Producto $p)
    {
        try {
            $sql = "INSERT INTO productos (nombre,marca, costo,precio, cantidad, imagen) VALUES (:nombre, :marca, :costo, :precio, :cantidad, :imagen)";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(':nombre', $p->getProd_nombre());
            $consulta->bindParam(':marca', $p->getProd_marca());
            $consulta->bindParam(':costo', $p->getProd_costo());
            $consulta->bindParam(':precio', $p->getProd_precio());
            $consulta->bindParam(':cantidad', $p->getProd_cantidad());
            $consulta->bindParam(':imagen', $p->getProd_imagen());
            $consulta->execute();

    }catch (Exception $e){
        die($e->getMessage());
    }
}
  /***METODO PARA OBTENER PRODUCTO SELECCIONADO ****/
  public function Obtener($id){
    try {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $res = $consulta->fetch(PDO::FETCH_OBJ); // ACA DIGO QUE ME DEVUELVA UN OBJETO CON EL PRODUCTO SELECCIONADO
        // acac creo una instancia para producto a la que voy a ir setenado los valores es decir agarra todos esos valores de esa id y la almacena en $p
        $p= new Producto();
        $p->setProd_id($res->id);
        $p->setProd_nombre($res->nombre);
        $p->setProd_marca($res->marca);
        $p->setProd_costo($res->costo);
        $p->setProd_precio($res->precio);
        $p->setProd_cantidad($res->cantidad);
        $p->setProd_imagen($res->imagen);
        return $p;// almacena en $p
  } catch (PDOException $e) {
    die($e->getMessage());
  
}
  }
   /***METODO PARA ACTUALIZAR PRODUCTO  ****/

    public function Actualizar(Producto $p)
    {
        try {
            $sql = "UPDATE productos SET nombre = :nombre, marca = :marca, costo = :costo, precio = :precio, cantidad = :cantidad, imagen = :imagen WHERE id = :id";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(':id', $p->getProd_id());
            $consulta->bindParam(':nombre', $p->getProd_nombre());
            $consulta->bindParam(':marca', $p->getProd_marca());
            $consulta->bindParam(':costo', $p->getProd_costo());
            $consulta->bindParam(':precio', $p->getProd_precio());
            $consulta->bindParam(':cantidad', $p->getProd_cantidad());
            $consulta->bindParam(':imagen', $p->getProd_imagen());
            $consulta->execute();
        }catch (PDOException $e){ // da igual si usamos PDOException O solo Exception
            die($e->getMessage());
        }
}
   /***METODO PARA eliminar PRODUCTO  ****/
    public function Eliminar($id)
    {
        try {
            $sql = "DELETE FROM productos WHERE id = :id";
            $consulta = $this->pdo->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}