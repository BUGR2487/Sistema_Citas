<?php
    $mysqli = new mysqli("localhost", "root", "", "CitasCETAC");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtPassword'];
    //Aquí se da de alta los usuarios nuevos para ver las citas----------------------
    $mysqli->query("INSERT INTO usuarios (nombre, correo, passw) VALUES ('".$nombre."','",$correo."','".$password."')");
    header("Location: administrador.php");
    die();
?>