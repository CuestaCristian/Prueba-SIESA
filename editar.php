<?php

require_once('base_de_datos.php');

if (empty($_GET["id"])) {
	exit("No hay id");
}

$sentencia = $baseDeDatos->prepare("SELECT * FROM productos WHERE id = :id LIMIT 1;");
$sentencia->bindParam(":id", $_GET["id"]);
$sentencia->execute();
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) { #Si no existe ningún registro con ese id
	exit("No hay ningún producto con ese ID");
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar un producto</title>
</head>
<body>
	<form action="guardar_cambios.php" method="post">
		<!-- Guardamos el ID del producto para enviarlo con los demás datos -->
		<!-- Este ID no debe ser cambiado, pues con él haremos el update -->
		<input name="id" type="hidden" value="<?php echo $producto->id ?>">
		<label for="nombre">Nombre</label>
		<input value="<?php echo $producto->nombre; ?>" type="text" id="nombre" name="nombre" required placeholder="Ingresa el nombre del producto">
		<br>
		<br>
		<label for="descripcion">Descripcion</label>
		<input value="<?php echo $producto->descripcion; ?>" type="text" id="descripcion" name="descripcion" required placeholder="Ingresa la descripcion del producto">
		<br>
		<br>
		<label for="precio">Precio</label>
		<input value="<?php echo $producto->precio; ?>" type="number" id="precio" name="precio" required placeholder="Ingresa el precio del producto">
		<br>
		<br>
		<label for="descuento">Descuento</label>
		<input value="<?php echo $producto->descuento; ?>" type="number" id="descuento" name="descuento" required placeholder="Ingresa el descuento del producto">
		<br>
		<br>
		<button type="submit">Guardar</button>
	</form>
	<br>
	<a href="tabla_dinamica.php">Ver todos los productos</a>
</body>
</html>