<?php
require "conexion.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>

    <form>
        <select>
            <optgroup label="Perico">
                <option value="4">Blue</option>
            </optgroup>
        </select>
    </form>
    <p>
        <a href="registro.php">Registro de mascota</a>
    </p>

    <?php

    try {
        $conexion = abrirConexion();

        $sql = "SELECT m.nombre mascota, m.id_mascota, e.nombre especie
        FROM mascota m
        JOIN especie e ON m.id_especie = e.id_especie
        ORDER BY e.nombre";
        // WHERE id_propietario = 1

        $resultado = $conexion->query($sql);

        //var_dump($resultado);

        $especie = '';
        echo '<select>';
        foreach ($resultado as $row) {
            if ($especie != $row['especie']) {
                if ($especie != '') {
                    echo '</optgroup>';
                }
                $especie = $row['especie'];
                echo '<optgroup label="' . $especie . '">';
            }
            //var_dump($row);
            echo '<option value="' . $row['id_mascota'] . '">' . $row['mascota'] . '</option>';
        }
        echo '</optgroup>';
        echo '</select>';
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    ?>
</body>
</html>