<?php 
/* Aquí se generán las consultas y el alta de los estudiantes y citas
Revisa si existe alguna cita con las mismas características
Depués revisa si existe un estuiante o persona con el mismo nombre y fecha de nacimiento para no repetir la información
Después da de alta la cita o le avisa al usuario que no esta disponible ese día. */
            $mysqli = new mysqli("localhost", "root", "", "CitasCETAC");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            echo $mysqli->host_info . "\n";
            $apellidoPaterno = $_POST['TxtApellidoPaterno'];
            $apellidoMaterno = $_POST['TxtApellidoMaterno'];
            $nombres = $_POST['TxtNombre'];
            $pais = $_POST['TxtPaisOrigen'];
            $nacionalidad = $_POST['TxtNacionalidad'];
            $nacimiento = $_POST['TxtLugarNacimiento'];
            $fechaNacimiento = $_POST['TxtFechaNacimiento'];
            $calle = $_POST['TxtCalle'];
            $numero = $_POST['TxtNumero'];
            $colonia= $_POST['TxtColonia'];
            $municipio = $_POST['TxtMunicipio'];
            $ciudad = $_POST['TxtCiudad'];
            $cp = $_POST['TxtCodigoPostal'];
            $estado = $_POST['TxtEstado'];
            $email = $_POST['TxtCorreoElectronico'];
            $email2 = $_POST['TxtCorreoElectronicoAlterno'];
            $telefono = $_POST['TxtTelefonoDomicilio'];
            $celular = $_POST['TxtTelefonoCelular'];
            $oficina = $_POST['TxtTelefonoOficina'];
            $asunto = $_POST['asunto'];
            $fechaCita = $_POST['TxtFechaCita'];
            $hora = $_POST['hora'];
            $direccion = $calle." ".$numero." ".$colonia." ".$municipio." C.P.".$cp." ".$estado;
            
            $citas = $mysqli->query("SELECT * FROM cita WHERE hora='".$hora."' AND fecha='".$fechaCita."' ");
            $numCitas = mysqli_num_rows($citas);
            if($numCitas>0){
                echo '<script>
                        alert("Lo sentimos, ese horario ya ha sido agendado.");
                    </script>';
            }
            else{
                $personas = $mysqli->query("SELECT * FROM persona WHERE nombres='".$nombres."' AND apellidoParterno='".$apellidoPaterno."' AND apellidoMaterno='".$apellidoMaterno."' AND nacimiento='".$fechaNacimiento."'");
                $numPersonas = mysqli_num_rows($personas);
                if($numPersonas == 0){
                    $mysqli->query("INSERT INTO persona(nombres, apellidoParterno, apellidoMaterno, pais, nacionalidad, nacimiento, lugarNacimiento, domicilio, correo, otroCorreo, telefono, celular, oficina) VALUES ('".$nombres."','".$apellidoPaterno."','".$apellidoMaterno."','".$pais."','".$nacionalidad."','".$fechaNacimiento."','".$nacimiento."','".$direccion."','".$email."','".$email2."','".$telefono."','".$celular."','".$oficina."')");
                }
                $personas = $mysqli->query("SELECT id FROM persona WHERE nombres='".$nombres."' AND apellidoParterno='".$apellidoPaterno."' AND apellidoMaterno='".$apellidoMaterno."' AND nacimiento='".$fechaNacimiento."'");
                while($persona = $personas->fetch_assoc()){
                    $idPersona = $persona['id'];
                }
                $mysqli->query("INSERT INTO cita( asunto, persona, hora, fecha) VALUES ('".$asunto."','".$idPersona."','".$hora."','".$fechaCita."')");
                echo '<script>
                        alert("Cita registrada correctamente.");
                    </script>';
            } 
            header("Location: index.php");
            die();
        ?>