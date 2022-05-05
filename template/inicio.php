<?php
include '../template/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <nav>
        Encabezado
    </nav>
    <form action="" method="POST">
    <table class="tabla3">
       <tr>
           <td>Ingrese numero de documento<input type="text" name="txtdato" class="box"></td>
           <td class="boton"><input type="submit" value="Registrar..." name="btnpreguntar"></td>
       </tr>
    </table>
  </form>

  <?php
    if (isset($_POST['btnpreguntar'])){
        $dato= $_POST['txtdato'];
        if ($dato != "") {
            try {
                $sql="SELECT * FROM usuario WHERE cedula_usuario =?";
                $resultado = $cadena->prepare($sql);
                $resultado -> execute(array($dato));
                $contador = $resultado -> rowCount();
                   if ($contador >= 1) {
                      while ($consulta = $resultado->fetch(PDO:: FETCH_ASSOC)){
                      ?>
                            <form action="" name="form1" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Datos de usuario</legend>
                                    <table>
                                            <tr>
                                                <td><label name="nomusu" id="nomusu"><?php echo $consulta['nombre_usuario']?></label></td>
                                            </tr>
                                            <tr>
                                                <td><label name="cedusu" id="cedusu" ><?php echo $consulta['cedula_usuario']?></label></td>
                                            </tr>
                                            <tr>
                                                <td><label name="dirusu" id="dirusu"><?php echo $consulta['direccion_usuario']?></label></td>
                                            </tr>
                                            <tr>
                                                <td><label name="telusu" id="telusu"><?php echo $consulta['telefono_usuario']?></label></td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <fieldset>
                                    <legend>Informacion de la Finca</legend>
                                    <table>
                                            <tr>
                                                <td><input type="text" name="nomfin" id="nomfin" placeholder="Nombre de la finca" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="ubifin" id="ubifin" placeholder="Ubicacion" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="altfin" id="altfin" placeholder="Altitud" required></td>
                                            </tr>
                                            <tr>
                                                <td>Fotografia de Referencia <br> <input type="file" name="finca[]"  required></td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <fieldset>
                                    <legend>Informacion de la Variedad</legend>
                                    <table>
                                            <tr>
                                                <td><input type="text" name="nomvar" id="nomfin" placeholder="Nombre de la variedad" required></td>
                                            </tr>
                                            <tr>
                                                <td>Fotografia de Referencia <br> <input type="file" name="files[]"  required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="desVar" id="desVar"  placeholder="Descripcion" required></td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <fieldset>
                                    <legend>Informacion del proceso</legend>
                                    <table>
                                            <tr>
                                                <td><input type="text" name="nompro" id="nompro" placeholder="Nombre del proceso" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="tipro" id="tipro"  placeholder="Tipo de proceso" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="frapro" id="fravar"  placeholder="Fragancia / Aroma" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="sabpro" id="sabpro"  placeholder="Sabor" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="acipro" id="acipro"  placeholder="Acidez" required></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="cuepro" id="cuevar"  placeholder="Cuerpo" required></td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <input type="submit" name="botonReg" value="Registrar">
                            </form>                    
                       <?php
                       
                      }
                   }else{
                       // formulario 
                       ?>
                        <form action="" name="form1" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Datos de usuario</legend>
                            <table>
                                    <tr>
                                        <td><input type="text" name="nomusu" id="nomusu" placeholder="Nombre Completo" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="cedusu" id="cedusu" placeholder="Numero de documento" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="dirusu" id="dirusu" placeholder="Direccion de Recidencia" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="telusu" id="telusu" placeholder="Telefono de contacto" required></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset>
                            <legend>Informacion de la Finca</legend>
                            <table>
                                    <tr>
                                        <td><input type="text" name="nomfin" id="nomfin" placeholder="Nombre de la finca" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="ubifin" id="ubifin" placeholder="Ubicacion" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="altfin" id="altfin" placeholder="Altitud" required></td>
                                    </tr>
                                    <tr>
                                        <td>Fotografia de Referencia <br> <input type="file" name="finca[]"  required></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset>
                            <legend>Informacion de la Variedad</legend>
                            <table>
                                    <tr>
                                        <td><input type="text" name="nomvar" id="nomfin" placeholder="Nombre de la variedad" required></td>
                                    </tr>
                                    <tr>
                                        <td>Fotografia de Referencia <br> <input type="file" name="files[]"  required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="desVar" id="desVar"  placeholder="Descripcion" required></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <fieldset>
                            <legend>Informacion del proceso</legend>
                            <table>
                                    <tr>
                                        <td><input type="text" name="nompro" id="nompro" placeholder="Nombre del proceso" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="tipro" id="tipro"  placeholder="Tipo de proceso" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="frapro" id="fravar"  placeholder="Fragancia / Aroma" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="sabpro" id="sabpro"  placeholder="Sabor" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="acipro" id="acipro"  placeholder="Acidez" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="cuepro" id="cuevar"  placeholder="Cuerpo" required></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <input type="submit" name="botonReg" value="Registrar">
                    </form>
                       <?php
                   }
            } catch (Exception $e) {
                die ('ALERTA!!! Error al ejecutar la busqueda.... ' . $e-> getMessage () );
            }
    
        } 
              
        
        
        if (isset($_POST['botonReg'])){
                    $nomUsu = $_POST['nomusu'];
                    $cedUsu = $_POST['cedusu'];
                    $dirUsu = $_POST['dirusu'];
                    $telUsu = $_POST['telusu'];
                    $nomFin = $_POST['nomfin'];
                    $ubiFin = $_POST['ubifin'];
                    $altFin = $_POST['altfin'];
                    $fileFin = count($_FILES['finca']['name']);
                    $nomVar = $_POST['nomvar'];
                    $fileVar =count($_FILES['files']['name']);
                    $desVar = $_POST['desVar'];
                    $nomProce = $_POST['nompro'];
                    $tiPro = $_POST['tipro'];
                    $fraPro = $_POST['frapro'];
                    $sabPro = $_POST['sabpro'];
                    $aciPro = $_POST['acipro'];
                    $cuePro = $_POST['cuepro'];
                            
                            try {
                                $sql1 = "INSERT INTO `usuario`(`id_usuario`, `nombre_usuario`, `cedula_usuario`, `direccion_usuario`, `telefono_usuario`) VALUES ('', :nom, :ced, :dir, :tel)";
                                $resultado1 =$cadena->prepare($sql1);
                                $resultado1 -> execute(array(":nom"=>$nomUsu, ":ced"=>$cedUsu, ":dir"=>$dirUsu, ":tel"=>$telUsu));
                                
                                } catch (Exception $error) {
                                    die('Error en el registro de datos 1 '. $error->getMessage());
                                }
                
                            try {
                            $sql2 = "INSERT INTO `finca`(`id_finca`, `nombre_finca`, `ubicacion_finca`, `altitud_finca`, `foto_finca`, `ruta_finca`, `id_usua`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
                            $resultado2 =$cadena->prepare($sql2);
                            $idUsuario= $cadena->lastInsertId();
                            for ($i=0; $i < $fileFin; $i++) { 
                                $filename = $_FILES['finca']['name'][$i];
                                $carpeta = 'fotografiaFinca/'.$filename;
                                $file_extension = pathinfo($carpeta, PATHINFO_EXTENSION);
                                $file_extension = strtolower($file_extension);
                                $valid_extension = array("png", "jpeg", "jpg");
                                if (in_array($file_extension, $valid_extension)) {
                                    if (move_uploaded_file($_FILES['finca']['tmp_name'][$i],$carpeta)) {
                                    $resultado2 ->execute(array($nomFin, $ubiFin, $altFin, $filename, $carpeta, $idUsuario)); 
                                    }
                                }
                            }
                            } catch (Exception $error) {
                            die('Error en el registro de datos 2 '. $error->getMessage());
                            }
                
                            try {
                                $sql3 = "INSERT INTO `variedad` (`id_variedad`, `nombre_variedad`, `foto_variedad`, `ruta_variedad`, `descripcion_variedad`, `id_fin`) VALUES(NULL, ?, ?, ?, ?, ?)";
                                $resultado3 =$cadena->prepare($sql3);
                                $idFinca= $cadena->lastInsertId();
                                    for ($x=0; $x < $fileVar; $x++) { 
                                    $filename2 = $_FILES['files']['name'][$x];
                                    $carpeta2 = 'fotografiaVariedad/'.$filename2;
                                    $file_extension2 = pathinfo($carpeta2, PATHINFO_EXTENSION);
                                    $file_extension2 = strtolower($file_extension2);
                                    $valid_extension2 = array("png", "jpeg", "jpg");
                                    if (in_array($file_extension2, $valid_extension2)) {
                                        if (move_uploaded_file($_FILES['files']['tmp_name'][$x],$carpeta2)) {
                                            $resultado3 ->execute(array($nomVar, $filename2, $carpeta2, $desVar, $idFinca)); 
                                            
                                        }
                                }
                                }
                            } catch (Exception $error) {
                                die('Error en el registro de datos 3 '. $error->getMessage());
                            }
                
                        try {
                            $sql4 = "INSERT INTO `proceso`(`id_proceso`, `nombre_proceso`, `tipo_fer`, `fragancia_proceso`, `sabor_proceso`, `acidez_proceso`, `cuerpo_proceso`, `id_variedad`) VALUES(NULL, :npro, :tpro, :fpro, :spro, :apro, :cpro , :idva )";
                            $resultado4 = $cadena->prepare($sql4);
                            $idVariedad= $cadena-> lastInsertId();
                            $resultado4 ->execute(array(":npro"=>$nomProce, ":tpro"=>$tiPro, ":fpro"=>$fraPro, ":spro"=>$sabPro, ":apro"=>$aciPro, ":cpro"=>$cuePro , ":idva"=>$idVariedad));
                        }catch (Exception $error) {
                            die('Error en el registro de datos 4 '. $error->getMessage());
                        } 
                            ?>
                            <script lenguage="javascript">window.alert('Informacion registrada con exito!!!') </script>
                            <?php  
                }
        }

  ?>
</body>
</html>