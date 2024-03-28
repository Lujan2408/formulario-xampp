<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body id="body-php">

<?php 

$usuarios = [];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        for($i = 1; $i <= 3; $i++) {

                $nombre = $_POST['nombre'.$i];
                $apellido = $_POST['apellido'.$i];
                $correo = $_POST['correo'.$i];
                $tel = $_POST['tel'.$i];
                $pass = $_POST['pass'.$i];
                $sangre = $_POST['sangre'.$i];
                $tipo_sangre = $sangre;
                $rh = '';
                $grupo = ''; 
        
                // Validación de los digitos del tel
                if(strlen($tel) < 10 || !ctype_digit($tel)) {
                    echo "<div class='error'>Usuario " . $i . "<br>";
                    echo "<p>" . $nombre . " - El teléfono debe contener al menos 10 dígitos</p></div>";
                } else if (strlen($pass) < 8 || !preg_match('/[A-Z]/', $pass) || !preg_match('/[0-9]/', $pass)) {
                    echo "<div class='error'>Usuario " . $i . "<br>";
                    echo "<p>" . $nombre . " - La contraseña debe contener al menos 1 mayúscula, 1 número y 8 caracteres</p></div>";
                    echo "<br>";
                } else {
                    // Validación del tipo de sangre y grupo al que pertenece
                    if (strpos($sangre, '+') !== false) {
                        $rh = 'Positivo';
                        $grupo = str_replace('+', '', $sangre);
                    } elseif (strpos($sangre, '-') !== false) {
                        $rh = 'Negativo';
                        $grupo = str_replace('-', '', $sangre);
                    }
                    
                    //A la variable usuario le inyectamos todos los datos obtenido del form 
                    $usuario = array(
                        "nombre" => $nombre, 
                        "apellido" => $apellido,
                        "correo" => $correo,
                        "tel" => $tel, 
                        "pass" => $pass,
                        "sangre" => $sangre,
                        "rh" => $rh, 
                        "grupo_sanguineo" => $grupo
                    );
                    
                    array_push($usuarios, $usuario); //Se inyecta al arreglo de usuarios toda la información extraída de "usuario" 

                    echo "<div class='user-info'>Nombre: " . $nombre . "<br>";
                    echo "Apellido: " . $apellido . "<br>";
                    echo "Correo: " . $correo . "<br>";
                    echo "Teléfono: " . $tel . "<br>";
                    echo "Contraseña: " . $pass . "<br>";
                    echo "Tipo de sangre: " . $sangre . "<br>";
                    echo "Rh: " . $rh . "<br>";
                    echo "Grupo sanguíneo: " . $grupo . "<br><br></div>";
                }
                
            }

        echo "<a href='index.html'><button class='boton-regresar'>Regresar</button></a>";
    } else {
        
    }

?> 

</body>
</html>