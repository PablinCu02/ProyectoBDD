<?php

function abrirConexion(): MySQLi
{
    return new MySQLi("127.0.0.1", "root", "", "veterinaria");
}
