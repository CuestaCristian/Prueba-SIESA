<?php

require_once('base_de_datos.php');


if (empty($_GET["id"])) {
	exit("No hay ID");
}



$sentencia = $baseDeDatos->prepare("DELETE FROM productos WHERE id = :id");


$sentencia->bindParam(":id", $_GET["id"]);
$resultado = $sentencia->execute();
if($resultado === true){
	echo "Producto eliminado correctamente";
	echo '<br><a href="tabla_dinamica.php">Ver los productos</a>';
}else{
	echo "Lo sentimos, ocurrió un error";
}
?>