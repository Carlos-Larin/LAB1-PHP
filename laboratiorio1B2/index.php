<?php
include("modelo/conexcion.php");

// Si se está editando un registro
if (isset($_GET['editar'])) {
    $telefono = $_GET['editar'];
    error_log("Cargando datos para editar: Telefono=$telefono");
    $sql = $conexcion->query("SELECT * FROM datos1 WHERE Telefono='$telefono'");
    $datos1 = $sql->fetch_object();
    if ($datos1) {
        error_log("Datos cargados: " . print_r($datos1, true));
    } else {
        error_log("No se encontraron datos para el teléfono: $telefono");
    }
} else {
    $datos1 = null;
}

// Mostrar todos los registros
$sql = $conexcion->query("SELECT * FROM datos1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 1</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <h2>LAB 1 - Josué Villegas & Carlos Larín</h2>
    </header>
    <h1 class="text-center">BIENVENIDO AL LAB 1</h1>
    <div class="container-fluid row">
        <form class="col-4" method="POST" action="modelo/acciones.php">
            <input type="hidden" name="TelefonoOriginal" value="<?php echo isset($datos1->Telefono) ? $datos1->Telefono : ''; ?>">
            <legend class="text-center text-secondary">REGISTRO DE PERSONA NATURAL</legend>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre de la persona</label>
                <input type="text" id="Nombre" class="form-control" name="Nombre" value="<?php echo isset($datos1->Nombre) ? $datos1->Nombre : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido de la persona</label>
                <input type="text" id="Apellido" class="form-control" name="Apellido" value="<?php echo isset($datos1->Apellido) ? $datos1->Apellido : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono de la persona</label>
                <input type="text" id="Telefono" class="form-control" name="Telefono" value="<?php echo isset($datos1->Telefono) ? $datos1->Telefono : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="FechaNacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" id="FechaNacimiento" class="form-control" name="FechaNac" value="<?php echo isset($datos1->FechaNac) ? $datos1->FechaNac : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="btnRegistrar" value="<?php echo isset($datos1->Nombre) ? 'editar' : 'crear'; ?>">
                <?php echo isset($datos1->Nombre) ? 'Actualizar' : 'Registrar'; ?>
            </button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Primer nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?php echo $row->Nombre; ?></td>
                            <td><?php echo $row->Apellido; ?></td>
                            <td><?php echo $row->Telefono; ?></td>
                            <td><?php echo $row->FechaNac; ?></td>
                            <td>
                                <a href="index.php?editar=<?php echo $row->Telefono; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="modelo/acciones.php?eliminar=<?php echo $row->Telefono; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>Desarrollado por <strong>Josué Villegas</strong> y <strong>Carlos Larín</strong></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>