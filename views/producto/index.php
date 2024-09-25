<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Productos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
            <div class="card-header d-flex justify-content-between aling-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                </div>
                Lista de Productos
                <!-- Creo un boton para agregar -->
                <div>
                    <a href="?c=producto&a=CrearProd" class="btn btn-primary btn-flat">
                        <i class="fa fa-lg fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($this->modelo->Listar() as $res): ?>
                            <tr>
                                <td><?= $res->id ?></td>
                                <td><?= $res->nombre ?></td>
                                <td><?= $res->marca ?></td>
                                <td><?= $res->costo ?></td>
                                <td><?= $res->precio ?></td>
                                <td><?= $res->cantidad ?></td>
                                <td><?= $res->imagen ?></td>
                                <!-- Botones para editar y eliminar con iconos- EDITAR-->
                                <td> <a href="?c=producto&a=CrearProd&id=<?= $res->id ?>" class="btn btn-success btn-flat">
                                        <i class="fa fa-l fa-refresh"></i>
                                    </a> |
                                    <!-- BORRAR-->
                                    <a href="?c=producto&a=Borrar&id=<?= $res->id ?>" class="btn btn-danger btn-flat">
                                        <i class="fa fa-l fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?> <!-- Se recorre el array para mostrar los datos en la tabla -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>