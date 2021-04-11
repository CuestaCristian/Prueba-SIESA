<?php

require_once('base_de_datos.php');

if (empty($_POST["id"])) { # En este caso también necesitamos al ID
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["nombre"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["descripcion"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["precio"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}

if (empty($_POST["descuento"])) {
	exit("Faltan uno o más datos"); #Terminar el script definitivamente
}


$sentencia = $baseDeDatos->prepare("UPDATE productos 
	SET nombre = :nombre,
	descripcion = :descripcion,
	precio = :precio,
	descuento = :descuento
	WHERE id = :id");


$sentencia->bindParam(":id", $_POST["id"]);
$sentencia->bindParam(":nombre", $_POST["nombre"]);
$sentencia->bindParam(":descripcion", $_POST["descripcion"]);
$sentencia->bindParam(":precio", $_POST["precio"]);
$sentencia->bindParam(":descuento", $_POST["descuento"]);
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Producto guardado correctamente";
	echo '<br><a href="tabla_dinamica.php">Ver los productos</a>';
	echo '<br><a href="index.php">Pagina principal</a>';
}else{
	echo "Lo sentimos, ocurrió un error";
}
?>