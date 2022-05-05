<?php
include '../template/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro.css">
    <title>Registro de informacion</title>
</head>
<body>
   <nav>
       Encabezado
   </nav>
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
                        <td>Fotografia de Referencia <br> <input type="file" name="files[]"  required></td>
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
            <!--<fieldset>
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
            </fieldset> -->
            <input type="submit" name="botonReg" value="Registrar">
   </form>
</body>
</html>
<?php
if (isset($_POST['botonReg'])){
     $nomUsu = $_POST['nomusu'];
    $cedUsu = $_POST['cedusu'];
    $dirUsu = $_POST['dirusu'];
    $telUsu = $_POST['telusu'];
    $nomFin = $_POST['nomfin'];
    $ubiFin = $_POST['ubifin'];
    $altFin = $_POST['altfin'];
    $fileFin =count($_FILES['files']['name']); 
    $nomVar = $_POST['nomvar'];
    $fileVar =count($_FILES['files']['name']);
    $desVar = $_POST['desVar'];
      /*$nomProce = $_POST['nompro'];
    $tiPro = $_POST['tipro'];
    $fraPro = $_POST['frapro'];
    $sabPro = $_POST['sabpro'];
    $aciPro = $_POST['acipro'];
    $cuePro = $_POST['cuepro'];
    
    $idvar = 1;*/ 
 $idUsu = 1;
 $idFin = 1;
   try {
         $sql1 = "INSERT INTO `usuario`(`id_usuario`, `nombre_usuario`, `cedula_usuario`, `direccion_usuario`, `telefono_usuario`) VALUES ('', :nom, :ced, :dir, :tel)";
         $resultado1 =$cadena->prepare($sql1);
         $resultado1 -> execute(array(":nom"=>$nomUsu, ":ced"=>$cedUsu, ":dir"=>$dirUsu, ":tel"=>$telUsu));
        
        } catch (Exception $error) {
            die('Error en el registro de datos '. $error->getMessage());
         }

           try {
            $sql2 = "INSERT INTO `finca`(`id_finca`, `nombre_finca`, `ubicacion_finca`, `altitud_finca`, `foto_finca`, `ruta_finca`, `id_usuario`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
            $resultado2 =$cadena->prepare($sql2);
            for ($i=0; $i < $fileFin; $i++) { 
               $filename = $_FILES['files']['name'][$i];
               $carpeta = 'fotografiaFinca/'.$filename;
               $file_extension = pathinfo($carpeta, PATHINFO_EXTENSION);
               $file_extension = strtolower($file_extension);
               $valid_extension = array("png", "jpeg", "jpg");
               if (in_array($file_extension, $valid_extension)) {
                   if (move_uploaded_file($_FILES['files']['tmp_name'][$i],$carpeta)) {
                    $resultado2 ->execute(array($nomFin, $ubiFin, $altFin, $filename, $carpeta, $idUsu)); 
                   }
               }
            }
         } catch (Exception $error) {
            die('Error en el registro de datos '. $error->getMessage());
         }

       try {
        $sql3 = "INSERT INTO `variedad`(`id_variedad`, `nombre_variedad`, `foto_variedad`, `ruta_variedad`, `descripcion_variedad`, `id_finca`) VALUES(NULL, ?, ?, ?, ?, ?)";
        $resultado3 =$cadena->prepare($sql3);
            for ($x=0; $i < $fileVar; $x++) { 
            $filename2 = $_FILES['files']['name'][$i];
            $carpeta2 = 'fotografiaVariedad/'.$filename2;
            $file_extension2 = pathinfo($carpeta2, PATHINFO_EXTENSION);
            $file_extension2 = strtolower($file_extension2);
            $valid_extension2 = array("png", "jpeg", "jpg");
            if (in_array($file_extension2, $valid_extension2)) {
                if (move_uploaded_file($_FILES['files']['tmp_name'][$x],$carpeta2)) {
                    $resultado3 ->execute(array($nomVar, $filename2, $carpeta2, $desVar, $idFin)); 
                    
                }
           }
        }
       } catch (Exception $error) {
        die('Error en el registro de datos '. $error->getMessage());
       }

           

         /*$sql4 = "INSERT INTO `proceso`(`id_proceso`, `nombre_proceso`, `tipo_fer`, `fragancia_proceso`, `sabor_proceso`, `acidez_proceso`, `cuerpo_proceso`, `id_variedad`) VALUES('', :npro, :tpro, :fpro, :spro, :apro, :cpro; :idva )";
         $resultado4 = $cadena->prepare($sql4);
         $resultado4 ->execute(array(":npro"=>$nomProce, ":tpro"=>$tiPro, ":fpro"=>$fraPro, ":spro"=>$sabPro, ":apro"=>$aciPro, ":cpro"=>$cuePro, ":idva"=>$idvar));
          */
         ?>
          <script lenguage="javascript">window.alert('Informacion registrada con exito!!!') </script>
         <?php  

    

}
?>