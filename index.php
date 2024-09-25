<!-- El Patrón Modelo Vista Controlador (MVC) es uno de los patrones de diseño más utilizados y populares en el desarrollo de aplicaciones web. Su objetivo es separar la lógica de negocio, los datos y la interfaz de usuario en tres componentes distintos (Modelo, Vista y Controlador), haciendo que el código sea más flexible, escalable y fácil de mantener. -->
<?php 
// c=catalogo
if (!isset($_GET['c'])){//si no recibes nada de get me cargar inicio.controler
    require_once "controllers/inicio.controller.php";
    $controlador=new InicioControlador();

    call_user_func(array($controlador,'Inicio'));// es otra forma de llamar a la funcion a los valores de la funcion // ese 'Inicio' se saca de controllers/inicio.controller linea 10. 

}else {
    $controlador=$_GET['c'];
    require_once "controllers/$controlador.controller.php";
    $controlador=ucwords($controlador) . 'Controlador';
    $controlador= new $controlador;
    //a = accion-> lo que va hacer. ej: guardar, borrar
    $accion=isset($_GET['a'])? $_GET['a']: 'Inicio';
    call_user_func(array($controlador,$accion));
}