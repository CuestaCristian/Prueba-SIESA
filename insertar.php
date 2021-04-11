<?php

require_once('base_de_datos.php');

$sentencia = $baseDeDatos->prepare("INSERT INTO productos (nombre, descripcion, precio,descuento)
	VALUES(:nombre, :descripcion, :precio, :descuento);");


$sentencia->bindParam(':nombre', $_POST["nombre"]);
$sentencia->bindParam(':descripcion', $_POST["descripcion"]);
$sentencia->bindParam(':precio', $_POST["precio"]);
$sentencia->bindParam(':descuento', $_POST["descuento"]);
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Producto registrado correctamente";
	echo '<br><a href="tabla_dinamica.php">Ver los productos</a>';

}else{
	echo "Lo sentimos, ocurrió un error";
}
?>