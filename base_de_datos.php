<?php

try{
$baseDeDatos = new PDO('sqlite:productos.db');

$baseDeDatos->exec("CREATE TABLE IF NOT EXISTS productos(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nombre TEXT NOT NULL,
	descripcion TEXT NOT NULL,
	precio INTEGER NOT NULL,
	descuento INTEGER NOT NULL
);");

}catch(PDOException $e){
      echo $e->getMessage();
}

?>