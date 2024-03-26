<?php 

$usuarios = [];

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
        if(strlen($tel) <= 10 || !ctype_digit($tel)) {
            echo "Usuario" . " " . $i;
            echo "<br>";
            echo $nombre . "<p>El teléfono debe contener al menos 10 dígitos</p>";
            // echo "<br>";
        } 

        // Validación de los caracteres, mayuscula y numero de la contraseña
        if(strlen($pass) < 8 || !preg_match('/[A-Z]/', $pass) || !preg_match('/[0-9]/', $pass)) {
            echo "<p>La contraseña debe contener al menos 1 mayúscula, 1 número y 8 caracteres</p>";
            echo "<br>";
            echo "<br>";        
        }

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
    }


print_r($usuarios); 


echo "<a href='index.html'><button>Regresar</button></a>";

?> 