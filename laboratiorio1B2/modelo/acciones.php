<?php
include("conexcion.php");

// Crear un nuevo registro
if (isset($_POST['btnRegistrar']) && $_POST['btnRegistrar'] == 'crear') {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $FechaNac = $_POST['FechaNac'];

    $sql = $conexcion->prepare("INSERT INTO datos1 (Nombre, Apellido, Telefono, FechaNac) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $Nombre, $Apellido, $Telefono, $FechaNac);
    $sql->execute();
    header("Location: ../index.php");
    exit(); // Asegúrate de que el script se detenga después de redirigir
}

// Editar un registro existente
if (isset($_POST['btnRegistrar']) && $_POST['btnRegistrar'] == 'editar') {
    $telefonoOriginal = $_POST['TelefonoOriginal']; // Teléfono original para identificar el registro
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Telefono = $_POST['Telefono'];
    $FechaNac = $_POST['FechaNac'];

    $sql = $conexcion->prepare("UPDATE datos1 SET Nombre=?, Apellido=?, Telefono=?, FechaNac=? WHERE Telefono=?");
    $sql->bind_param("sssss", $Nombre, $Apellido, $Telefono, $FechaNac, $telefonoOriginal);
    $sql->execute();
    header("Location: ../index.php");
    exit(); // Asegúrate de que el script se detenga después de redirigir
}

// Eliminar un registro
if (isset($_GET['eliminar'])) {
    $Telefono = $_GET['eliminar']; // Usamos el campo 'Telefono' como identificador
    $sql = $conexcion->prepare("DELETE FROM datos1 WHERE Telefono=?");
    $sql->bind_param("s", $Telefono);
    $sql->execute();
    header("Location: ../index.php");
    exit(); // Asegúrate de que el script se detenga después de redirigir
}
?>