<?php
include("conexcion.php");

if (isset($_POST['btnRegistrar'])) {
    $accion = $_POST['btnRegistrar'];

    if ($accion == "crear") {
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['apellidoPersona'];
        $telefono = $_POST['telefonoPersona'];
        $fechaNacimiento = $_POST['fechaNacimiento'];

        $sql = $conexcion->prepare("INSERT INTO datos (Nombre, apellidoPersona, telefonoPersona, fechaNacimiento) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $nombre, $apellido, $telefono, $fechaNacimiento);
        $sql->execute();
        header("Location: ../index.php");
    }

    if ($accion == "editar") {
        $id = $_POST['id'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $fechaNacimiento = $_POST['FechaNac'];

        $sql = $conexcion->prepare("UPDATE datos1 SET Nombre=?, Apellido=?, Telefono=?, FechaNac=? WHERE id=?");
        $sql->bind_param("ssssi", $nombre, $apellido, $telefono, $fechaNacimiento, $id);
        $sql->execute();
        header("Location: ../index.php");
    }
}

if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = $conexcion->prepare("DELETE FROM datos WHERE id=?");
    $sql->bind_param("i", $id);
    $sql->execute();
    header("Location: ../index.php");
}
?>