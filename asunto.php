<?php
/* Aquí se da de alta los asuntos que desean que los estudiantes puedan agendar una cita. */
    $mysqli = new mysqli("localhost", "root", "", "CitasCETAC");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $nombre = $_POST['txtAsunto'];
    $mysqli->query("INSERT INTO asunto (nombre) VALUES ('".$nombre."')");
    header("Location: administrador.php");
    die();
?>