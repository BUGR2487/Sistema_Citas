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
            ?>
    </head>

    <body>
            <div class="contenedor">
                <section id="cabecera">
                    <div class="cabecera">
                        <img src="../imagenes/logo_cetac.png" alt="">
                        <a href="login.html"> Iniciar sesión </a>
                    </div>
                </section>
                <br>
                <form method="POST" name="FrmPrincipal" action="baseDeDatos.php">
                    <h1>Sistema de citas - CETAC 01</h1>
                    <label class="texto"> Los campos marcados con (<label class="asterisco">*</label>) es información requerida. </label>    

                    <h2>Datos personales</h2>
                    <section id="datos-personales">
                        <div>
                            <label> Apellido Paterno </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtApellidoPaterno" required>
                        </div>

                        <div>
                            <label> Apellido Materno </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtApellidoMaterno" required> <br>
                        </div>

                        <div>
                            <label> Nombre(s) </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtNombre" required> <br>
                        </div>

                        <div>
                            <label> País de origen </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtPaisOrigen" required> <br>
                        </div>

                        <div>
                            <label> Nacionalidad </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtNacionalidad" required> <br>
                        </div>

                        <div>
                            <label> Lugar de nacimiento </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtLugarNacimiento" required> <br>
                        </div>

                        <div>
                            <label> Fecha de nacimiento </label> <label class="asterisco">*</label> <br>
                            <input type="date" name="TxtFechaNacimiento" required> <br>
                        </div>
                    </section>

                    <h2>Domicilio</h2>
                    <section id="domicilio">
                        <div>
                            <label> Calle </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtCalle" required> <br>
                        </div>

                        <div>
                            <label> Número </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtNumero" required> <br>
                        </div>
                        
                        <div>
                            <label> Colonia </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtColonia" required> <br>
                        </div>

                        <div>
                            <label> Alcaldía o Municipio </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtMunicipio" required> <br>
                        </div>

                        <div>
                            <label> Ciudad </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtCiudad" required> <br>
                        </div>

                        <div>
                            <label> Código postal </label> <label class="asterisco">*</label> <br>
                            <input type="number" name="TxtCodigoPostal" required> <br>
                        </div>

                        <div>
                            <label> Estado </label> <label class="asterisco">*</label> <br>
                            <input type="text" name="TxtEstado" required> <br>
                        </div>
                    </section>

                    <h2>Datos de contacto</h2>
                    <section id="datos-contacto">
                        <div>
                            <label> Correo Electrónico </label> <label class="asterisco">*</label> <br>
                            <input type="email" name="TxtCorreoElectronico" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required> <br>
                        </div>

                        <div>
                            <label> Correo Electrónico (alterno) </label>  <br>
                            <input type="email" name="TxtCorreoElectronicoAlterno" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$"> <br>
                        </div>

                        <div>
                            <label> Tel. Domicilio (con clave LADA) </label> <label class="asterisco">*</label> <br>
                            <input type="tel" name="TxtTelefonoDomicilio" required> <br>
                        </div>  

                        <div>
                            <label> Tel. Celular </label> <label class="asterisco">*</label> <br>
                            <input type="tel" name="TxtTelefonoCelular" required> <br>
                        </div>  

                        <div>
                            <label> Tel. Oficina (con clave LADA) </label> <br>
                            <input type="tel" name="TxtTelefonoOficina"> <br>
                        </div>
                    </section>

                    <h2>Datos de cita</h2>
                    <section id="datos-cita">
                        <div>
                            <label> Asunto de la cita </label> <label class="asterisco">*</label> <br>
                            <?php 
                            $asusntos = $mysqli->query("SELECT id, nombre FROM asunto ORDER BY nombre ASC");?>
                            <select name="asunto">
                                <?php 
                                    while($fila = $asusntos->fetch_assoc()){
                                        echo "<option value=".$fila['id'].">".$fila['nombre']."</option>";
                                    }
                                ?>
                            </select>
                                 <br>
                        </div>

                        <div>
                            <label> Fecha de la cita </label> <label class="asterisco">*</label> <br>
                            <input type="date" name="TxtFechaCita" required> <br>
                        </div>                 
                        
                        <div>
                            <label> Hora de la cita </label> <label class="asterisco">*</label> <br>
                            <select name="hora">
                                <option value="8:00" selected>8:00</option>
                                <option value="8:30">8:30</option>
                                <option value="9:00">9:00</option>
                                <option value="9:30">9:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <option value="16:30">16:30</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                              </select>
                        </div>
                    </section>

                    <input class="button" type="submit" value="Agendar Cita" onclick="mensajeConfirmacion()">

                    <!-- <script>
                        function mensajeConfirmacion() {
                            alert("Cita registrada correctamente.");
                            document.getElementById('FrmPrincipal').reset();
                        }

                        function citaOcupada() {
                            alert("Lo sentimos, ese horario ya ha sido agendado.");
                        }
                    </script> -->

                </form>
            </div>
    </body>

</html>