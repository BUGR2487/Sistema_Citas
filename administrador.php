<?php 
    session_start();
    if(!$_SESSION["autorizado"]){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/estilos_formulario.css">
        <link rel="shortcut icon" href="../imagenes/logo_cetac.png">
        <title> Sistema de citas - CETAC 01 </title>
        <?php $mysqli = new mysqli("localhost", "root", "", "CitasCETAC");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $fecha = $mysqli->query("SELECT CURRENT_DATE() as fecha");
            while($hoy = $fecha->fetch_assoc()){
                $dia = $hoy['fecha'];
            }
        ?>
    </head>

    <body>
            <div class="contenedor">
                <section id="cabecera">
                    <div class="cabecera">
                        <img src="../imagenes/logo_cetac.png" alt="">
                        <a href="cerrar.php"> Cerrar sesión </a>
                    </div>
                </section>
                <br>
                <!-- Este formulario debe de mandar los datos por método POST a usuario.php dónde se da de alta a los usuairos nuevos -->
                <!-- <form method="POST" name="FrmUsuario" action="usuario.php">
                    <h1>Sistema de citas - CETAC 01</h1>
                    <label class="texto"> Los campos marcados con (<label class="asterisco">*</label>) es información requerida. </label>    

                    <h2>Usuario Nuevo</h2>
                    <section id="datos-personales">
                        <div>
                            <label> Nombre Completo </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="txtNombre" required>
                        </div>

                        <div>
                            <label> Correo </label> <label class="asterisco">*</label> <br>
                            <input type="email" name="txtCorreo" required> <br>
                        </div>

                        <div>
                            <label> Contraseña </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="txtPassword" required> <br>
                        </div>
                    </section>
                    <input class="button" type="submit" value="Agregar Usuario" >
                </form> -->
                <!-- Este formulario es para dar de alta los asuntos que la escuela quiere que les muestra a los estudiantes para registrarse -->
                <form method="POST" name="FrmAsunto" action="asunto.php">  
                    <h2>Nuevo asunto</h2>
                    <section id="asuntos">
                        <div>
                            <label>Nombre del asunto </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="txtAsunto" required>
                        </div>
                        <div>
                            <input class="button" type="submit" value="Agregar Asunto" >
                        </div>
                    </section>
                </form>
                <div>
                        <table name="Asuntos">
                            <tr>
                                <th>Nombre del asunto</th>
                            </tr>
                            <?php 
                                $asusntos = $mysqli->query("SELECT id, nombre FROM asunto ORDER BY nombre ASC");
                                while($fila = $asusntos->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $fila['nombre'];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>

                        </table>
                        </div>
                <section>
                
                </section>
                <h2>Citas Agendadas</h2>
                <div>
                    <table name="tablaCitas">
                        <tr>
                            <th>Nombres</th>
                            <th>Peterno</th>
                            <th>Materno</th>
                            <th>Celular</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Asunto</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                        <?php
                            $citas = $mysqli->query("SELECT nombres, apellidoParterno, apellidoMaterno, celular, telefono, correo, nombre, fecha, hora FROM cita INNER JOIN asunto ON cita.asunto=asunto.id INNER JOIN persona ON cita.persona = persona.id WHERE cita.fecha>='".$dia."' ORDER BY cita.fecha, cita.hora ASC");
                            foreach ($citas as $fila){
                                echo "<tr>";
                                        foreach($fila as $dato){
                                            echo "<td>";
                                                echo $dato;
                                            echo "</td>";
                                        }
                                echo "</tr>";
                            }
                            
                        ?>
                    </table>
                </div>
            </div>
    </body>

</html>