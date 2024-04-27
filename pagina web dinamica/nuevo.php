<?php
session_start();

// Verificar si las variables de sesión están establecidas
$nombre_apellidos = isset($_SESSION['nombre_apellidos']) ? $_SESSION['nombre_apellidos'] : '';
$fecha_nacimiento = isset($_SESSION['fecha_nacimiento']) ? $_SESSION['fecha_nacimiento'] : '';
$idiomas_niveles = isset($_SESSION['idiomas']) ? $_SESSION['idiomas'] : array(); // Verificar si es un array
$nacionalidad = isset($_SESSION['nacionalidad']) ? $_SESSION['nacionalidad'] : '';
$lenguajes_programacion = isset($_SESSION['lenguajes_programacion']) ? $_SESSION['lenguajes_programacion'] : array();
$habilidades = isset($_SESSION["habilidades"]) ? $_SESSION["habilidades"] : array();
$aptitudes = isset($_SESSION["aptitudes"]) ? $_SESSION["aptitudes"] : array();
$ocupacion = isset($_SESSION['ocupacion']) ? $_SESSION['ocupacion'] : '';
$experiencia = isset($_SESSION['experiencia']) ? $_SESSION['experiencia'] : '';
$formacion_secundaria = isset($_SESSION['formacion_secundaria']) ? $_SESSION['formacion_secundaria'] : '';
$formacion_superior = isset($_SESSION['formacion_superior']) ? $_SESSION['formacion_superior'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Currículum Vitae</title>
    <link rel="stylesheet" href="CSS/estilos2.css">
</head>
<body>

<div class="cv-contenido">

    <div class="header">
        <h1><?php echo $nombre_apellidos; ?></h1>
        <h2><?php echo $ocupacion; ?></h2>
        <h2><?php echo $nacionalidad; ?></h2>
    </div>

    <div class="mas-contenido">
        <div class="izq-column">
            <section class="contacto">
                <h3>Contacto</h3>
                <hr>
                <?php if (isset($_SESSION['telefono'])) : ?>
                    <p><img src="Fotos/telefono.png" alt="Teléfono"> <?php echo $_SESSION['telefono']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['email'])) : ?>
                    <p><img src="Fotos/email.png" alt="Email"> <?php echo $_SESSION['email']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['direccion'])) : ?>
                    <p><img src="Fotos/gps.png" alt="Dirección"> <?php echo $_SESSION['direccion']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['linkedin'])) : ?>
                    <p><img src="Fotos/linkedin.png" alt="Linkedin"> <?php echo $_SESSION['linkedin']; ?></p>
                <?php endif; ?>
            </section>

            <section class="idiomas">
                <h3>Idiomas</h3>
                <hr>
                <ul>
                    <?php foreach ($_SESSION['idiomas'] as $idioma_nivel) : ?>
                        <li><?php echo $idioma_nivel; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="aptitudes">
                <h3>Aptitudes</h3>
                <hr>
                <ul>
                    <?php foreach ($aptitudes as $aptitud) : ?>
                        <li><?php echo $aptitud; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="habilidades">
                <h3>Habilidades</h3>
                <hr>
                <ul>
                    <?php foreach ($habilidades as $habilidad) : ?>
                        <li><?php echo $habilidad; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            
        </div>

        <div class="der-column">

            <section class="lenguajes-programacion">
                <h3>Lenguajes de Programación</h3>
                <hr>
                <ul>
                    <?php foreach ($lenguajes_programacion as $lenguaje) : ?>
                        <li><?php echo $lenguaje; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="experiencia">
                <h3>Experiencia Laboral</h3>
                <hr>
                <p><?php echo $experiencia; ?></p>
            </section>
            
            <section class="formacion">
                <h3>Formación</h3>
                <hr>
                <h4>Educación secundaria</h4>
                <p><?php echo $formacion_secundaria; ?></p>
                <h4>Formación superior</h4>
                <p><?php echo $formacion_superior; ?></p>
            </section>
        </div>
    </div>

</div>

</body>
</html>
