<?php
$servidor= "localhost";
$baseDatos= "udesdb";
$puerto= "5432";
$usuario= "postgres";
$contraseña= "12345";
$conexion= ("host=$servidor port=$puerto dbname=$baseDatos user=$usuario password=$contraseña");
$conectar= pg_connect($conexion) or die ("error en la conexion");
echo("se conecto la BD correctamente");
?>