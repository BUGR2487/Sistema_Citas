<?php 
    session_start();
    $usuario = $_POST['TxtCorreoElectronico'];
    $password =$_POST['TxtContrasena'];
    if($usuario == "admin" and $password == "admin"){
        $_SESSION["autorizado"]=true;
        session_regenerate_id();
        header("Location: administrador.php");
    }
    else{
        echo '<script>
                        alert("Datos incorrectos.");
                </script>';
        header("Location: login.html");
    }
?>