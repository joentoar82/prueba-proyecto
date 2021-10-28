<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM empleados ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM empleados WHERE nombre1 LIKE :campo OR apellido1 LIKE :campo;'
		);
		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));
		$resultado=$select_buscar->fetchAll();
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>LISTADO EMPLEADOS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Primer Apellido</td>
				<td>Segundo Apellido</td>
				<td>Primer Nombre</td>
				<td>Segundo Nombre</td>
				<td>País</td>
				<td>Tipo de Identificación</td>
				<td>Número de Identificación</td>
				<td>Correo</td>
				<td>Fecha de Ingreso</td>
				<td>Área</td>
				<td>Estado</td>
				<td>Fecha y Hora Registro</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['apellido1']; ?></td>
					<td><?php echo $fila['apellido2']; ?></td>
					<td><?php echo $fila['nombre1']; ?></td>
					<td><?php echo $fila['nombre2']; ?></td>
					<td><?php echo $fila['pais']; ?></td>
					<td><?php echo $fila['tipo_ident']; ?></td>
					<td><?php echo $fila['num_ident']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['fecha_ingreso']; ?></td>
					<td><?php echo $fila['area']; ?></td>
					<td><?php echo $fila['estado']; ?></td>
					<td><?php echo $fila['fecha_reg']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>