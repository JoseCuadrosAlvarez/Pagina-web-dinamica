<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los de tu configuración)
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "curriculum";

    // Crear conexión
    $conn = new mysqli($server, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Capturar datos del formulario
    $nombre_apellidos = $_POST["nombre_apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $ocupacion = $_POST["ocupacion"];
    $idiomas = $_POST["idiomas"];
    $niveles = $_POST["niveles"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $linkedin = $_POST["linkedin"];
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : ""; // Manejo de campo opcional
    $habilidades = isset($_POST["habilidades"]) ? $_POST["habilidades"] : [];
    $aptitudes = isset($_POST["aptitudes"]) ? $_POST["aptitudes"] : [];
    $lenguajes_programacion = isset($_POST["lenguajes_programacion"]) ? $_POST["lenguajes_programacion"] : [];
    
    $formacion_secundaria = $_POST["formacion_secundaria"];
    $formacion_superior = $_POST["formacion_superior"];
    $experiencia = $_POST["experiencia"];


    // Combinar idiomas y niveles en un solo string
    $idiomas_niveles = [];
    for ($i = 0; $i < count($idiomas); $i++) {
        $idioma = $idiomas[$i];
        $nivel = $niveles[$i];
        $idiomas_niveles[] = "$idioma-$nivel";
    }
    $idiomas_niveles_str = implode(", ", $idiomas_niveles);

    // Consulta SQL para insertar los datos
    $sql = "INSERT INTO curriculum (nombre_apellidos, fecha_nacimiento, idiomas_niveles, telefono, email, linkedin, direccion, lenguajes_programacion, habilidades, aptitudes, experiencia, formacion_secundaria, formacion_superior) 
VALUES ('$nombre_apellidos', '$fecha_nacimiento', '$idiomas_niveles_str', '$telefono', '$email', '$linkedin', '$direccion', '" . implode(", ", $lenguajes_programacion) . "', '" . implode(", ", $habilidades) . "','" . implode(", ", $aptitudes) . "', '$experiencia', '$formacion_secundaria', '$formacion_superior')";

    // Ejecutar consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Guardar datos en sesión
        $_SESSION['nombre_apellidos'] = $nombre_apellidos;
        $_SESSION['ocupacion'] = $ocupacion;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['email'] = $email;
        $_SESSION['linkedin'] = $linkedin;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['idiomas'] = $idiomas_niveles;
        $_SESSION['lenguajes_programacion'] = $lenguajes_programacion;
        $_SESSION['habilidades'] = $habilidades;
        $_SESSION['aptitudes'] = $aptitudes;
        $_SESSION['experiencia'] = $experiencia;
        $_SESSION['formacion_secundaria'] = $formacion_secundaria;
        $_SESSION['formacion_superior'] = $formacion_superior;
        $conn->close();

        // Redirigir a la página de confirmación
        header("Location: nuevo.php");
        exit();
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente";
}
?>
