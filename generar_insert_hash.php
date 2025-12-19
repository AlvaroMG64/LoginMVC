<?php
/*
 * Generador de INSERTs para la tabla usuarios con password_hash
 * Úsalo solo para obtener los INSERTs correctos y copiar en usuarios.sql
 */

$usuarios = [
    ['idusuario' => 'Alvaro_MG64', 'password' => 'Uruguasho3*', 'nombre' => 'ALVARO', 'apellidos' => 'MOZO GASPAR'],
    ['idusuario' => 'Zazza_I5',   'password' => 'Abduzcan7#', 'nombre' => 'FEDERICO', 'apellidos' => 'ZOMPICCHIATTI'],
];

echo "<pre>"; // formato legible en navegador

echo "-- INSERTS para tabla usuarios con passwords hash\n\n";

foreach ($usuarios as $u) {
    $hash = password_hash($u['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO `usuarios` (`idusuario`, `password`, `nombre`, `apellidos`, `admitido`) VALUES ";
    $sql .= "('{$u['idusuario']}', '$hash', '{$u['nombre']}', '{$u['apellidos']}', 1);";
    echo $sql . "\n";
}

echo "</pre>";
?>