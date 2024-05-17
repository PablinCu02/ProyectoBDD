<?php
require "conexion.php";

$conexion = abrirConexion();
$mensaje = '';

if (isset($_POST['guardar'])) {
    $sql = "INSERT INTO mascota (nombre, id_especie, id_propietario, raza, fecha_nacimiento, observaciones)
    VALUES ('" . $_POST['nombre'] . "', ?, '{$_POST['id_propietario']}', ?, ?, ?)";
    // echo $sql;// INSERT INTO ... VALUES ('Matute', ?, '2', ?, ?, ?)
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute([$_POST['id_especie'], $_POST['raza'], $_POST['fecha_nacimiento'], $_POST['observaciones']]);
    if ($resultado) {
        header("Location: index.php");
        exit;
    } else {
        $mensaje = 'Error al guardar.';
    }
}

$propietarios = $conexion->query("SELECT id_propietario, nombre FROM propietario ORDER BY nombre");
$especies = $conexion->query("SELECT id_especie, nombre FROM especie ORDER BY nombre");

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

</head>

<body>
    <?php
    if ($mensaje) { ?>
        <p style="color: red"><?php echo $mensaje ?></p>
    <?php }
    ?>
    <form method="post">
        <p>
            <label for="id_propietario">Propietario</label>
            <select name="id_propietario" id="id_propietario" required>
            <?php
                foreach ($propietarios as $propietario) { ?>
                    <option value="<?php echo $propietario['id_propietario'] ?>"><?php echo $propietario['nombre'] ?></option>
                <?php }
            ?>
            </select>
        </p>
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </p>
        <p>
            <label for="id_especie">Especie</label>
            <select name="id_especie" id="id_especie" required>
            <?php
                foreach ($especies as $especie) { ?>
                    <option value="<?php echo $especie['id_especie'] ?>"><?php echo $especie['nombre'] ?></option>
                <?php }
            ?>
            </select>
        </p>
        <p>
            <label for="raza">Raza</label>
            <input type="text" name="raza" id="raza" required>
        </p>
        <p>
            <label for="fecha_nacimiento">Fecha nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        </p>
        <p>
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" required></textarea>
        </p>
        <p>
            <button type="submit" name="guardar">Guardar</button>
        </p>
    </form>

</body>

</html>