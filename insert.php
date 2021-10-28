<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$ape1=$_POST['apellido1'];
		$ape2=$_POST['apellido2'];
		$nom1=$_POST['nombre1'];
		$nom2=$_POST['nombre2'];
		$pais=$_POST['pais'];
		$tipo_ident=$_POST['tipo_ident'];
		$num_ident=$_POST['num_ident'];
		$correo=$_POST['correo'];
		$fecha_ingreso=$_POST['fecha_ingreso'];
		$area=$_POST['area'];
		$estado=$_POST['estado'];
		$fecha_reg=$_POST['fecha_reg'];

		if(!empty($ape1) && !empty($ape2) && !empty($nom1) && !empty($nom2) && !empty($pais) && !empty($tipo_ident) && !empty($num_ident) && !empty($correo) && !empty($fecha_ingreso) && !empty($area) && !empty($estado) && !empty($fecha_reg)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO empleados(apellido1,apellido2,nombre1,nombre2,pais,tipo_ident,num_ident,correo,fecha_ingreso,area,estado,fecha_reg) VALUES(:apellido1,:apellido2,:nombre1,:nombre2,:pais,:tipo_ident,:num_ident,:fecha_ingreso,:area,:estado,:fecha_reg)');
				$consulta_insert->execute(array(
					':apellido1' =>$ape1,
					':apellido2' =>$ape2,
					':nombre1' =>$nom1,
					':nombre2' =>$nom2,
					':pais' =>$pais,
					':tipo_ident' =>$tipo_ident,
					':num_ident' =>$num_ident,
					':correo' =>$correo,
					':fecha_ingreso' =>$fecha_ingreso,
					':area' =>$area,
					':estado' =>$estado,
					':fecha_reg' =>$fecha_reg
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/style-insert.css">
</head>
<body>
	<div class="container">
		<h2 class="title-ppal">Registro de Empleados</h2>
		<!-- <form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellidos" placeholder="Apellidos" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
				<input type="text" name="ciudad" placeholder="Ciudad" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" placeholder="Correo electrónico" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form> -->
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="apellido1" onkeyup="mayusculas(this);" placeholder="Ingresar Primer Apellido" maxlength="20" pattern="[A-Z]{3,20}" class="input__text" required>
				<input type="text" name="apellido2" onkeyup="mayusculas(this);" placeholder="Ingresar Segundo Apellido" maxlength="20" pattern="[A-Z]{3,20}" class="input__text" required>
				<input type="text" name="nombre1" onkeyup="mayusculas(this);" placeholder="Ingresar Primer Nombre" maxlength="20" pattern="[A-Z]{3,20}" class="input__text" required>
				<input type="text" name="nombre2" onkeyup="mayusculas(this);" placeholder="Ingresar Segundo Nombre" maxlength="50" pattern="[A-Z]{3,50}" class="input__text">
				<select name="pais" id="" class="input__text" required>
					<option>Seleccionar País donde prestará Servicios</option>
					<option value="1">Colombia</option> 
					<option value="2">Estados Unidos</option> 
				</select>
				<select name="tipo_ident" id="" class="input__text" required>
					<option>Seleccionar Tipo de Identificación</option>
					<option value="1">Cédula de Ciudadanía</option> 
					<option value="2">Cédula de Extranjería</option> 
					<option value="3">Pasaporte</option> 
					<option value="4">Permiso Especial</option> 
				</select>
				<input type="text" name="num_ident" placeholder="Ingresar Número de Identificación" pattern="^[a-zA-Z0-9]+$" maxlength="20" class="input__text" required>
				<input type="email" name="correo" placeholder="Ingresar Correo Electrónico" class="input__text" required>
				<input type="date" name="fecha_ingreso" placeholder="Fecha de Ingreso" class="input__text">
				<select name="area" id="" class="input__text" required>
					<option>Área a la cual Pertenece</option>
					<option value="1">Administración</option> 
					<option value="2">Financiera</option> 
					<option value="3">Compras</option> 
					<option value="4">Infra-estructura</option> 
					<option value="5">Operación</option> 
					<option value="6">Talento Humano</option> 
					<option value="7">Servicios Varios</option> 
				</select>
				<input type="text" name="estado" value="Estado: Activo" readonly class="input__text">
				<input type="text" name="fecha_reg" id="date1" class="input__text" value="" readonly>
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>

	<script src="scripts/script.js"></script>
</body>
</html>
