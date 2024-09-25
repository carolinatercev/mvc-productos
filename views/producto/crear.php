<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $titulo ?></h1> <!-- con ese tiulo ahago ue cambie a actualiar en la pag -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="?c=Productos"><?= $titulo ?></a></li>
            <li class="breadcrumb-item active">Productos</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                Lista total de productos
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $titulo ?> Productos
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">

                            <div class="card-body">
                                <form method="POST" action="?c=producto&a=Guardar">
                                <div class=" row mb-3">
                                                <!-- hidden- oculto -->
                            <input type="hidden" id="idProd" name="idProd" value="<?=$p->getProd_id() ?>">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputNombre" type="text" name="nombre" value="<?=$p->getProd_nombre() ?>"/>
                                            <label for="inputNombre">Nombre</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" name="marca" type="text" value="<?=$p->getProd_marca() ?>"/>
                                            <label for="inputLastName">Marca</label>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputCosto" name="costo" type="number" value="<?=$p->getProd_costo() ?>"/>
                                <label for="inputCosto">Costo</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPrecio" name="precio" type="number" value="<?=$p->getProd_precio() ?>"/>
                                        <label for="inputPrecio">Precio</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputCantidad" name="cantidad" type="number"value="<?=$p->getProd_cantidad() ?>" />
                                        <label for="inputCantidad">Cantidad</label>
                                    </div>
                                </div>
                
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputImagen" name="imagen" type="file" value="<?=$p->getProd_imagen() ?>"/>
                                        <label for="inputImagen">Imagen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Enviar
                                </button>
                                
                            </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>