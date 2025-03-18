<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<d>
    <h1 class="text-center">BIENVENIDO AL LAB 1</h1>
    <div class="container-fluid row"></div>
        <form class="col-4" method="POST" action="modelo/acciones.php">
            <input type="hidden" name="id" value="<?php echo isset($datos->id) ? $datos->id : ''; ?>">
            <legend class="text-center text-secondary">REGISTRO DE PERSONA NATURAL</legend>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre de la persona</label>
                <input type="text" id="Nombre" class="form-control" name="Nombre" value="<?php echo isset($datos->Nombre) ? $datos->Nombre : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido de la persona</label>
                <input type="text" id="Apellido" class="form-control" name="Apellido" value="<?php echo isset($datos->apellidoPersona) ? $datos->apellidoPersona : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono de la persona</label>
                <input type="text" id="Telefono" class="form-control" name="Telefono" value="<?php echo isset($datos->telefonoPersona) ? $datos->telefonoPersona : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="FechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="FechaNacimiento" class="form-control" name="FechaNac" value="<?php echo isset($datos->fechaNacimiento) ? $datos->fechaNacimiento : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="<?php echo isset($datos->id) ? 'editar' : 'crear'; ?>">
                <?php echo isset($datos->id) ? 'Actualizar' : 'Registrar'; ?>
            </button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">primer nombre</th>
                    <th scope="col">apellido</th>
                    <th scope="col">telefono</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("modelo/conexcion.php");
                    if (isset($_GET['editar'])) {
                        $id = $_GET['editar'];
                        $sql = $conexcion->query("SELECT * FROM datos WHERE id=$id");
                        $datos = $sql->fetch_object();
                    }
                    $sql = $conexcion->query("SELECT * FROM datos1");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?php echo $datos->Nombre; ?></td>
                            <td><?php echo $datos->Apellido; ?></td>
                            <td><?php echo $datos->Telefono; ?></td>
                            <td><?php echo $datos->FechaNac; ?></td>
                            <td>
                                <a href="index.php?editar=<?php echo $datos->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="modelo/acciones.php?eliminar=<?php echo $datos->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>