<?php
	$usuario = $_POST['usuario'];
	$pasword = $_POST['pasword'];

	try{
		$base = new PDO('mysql:host=localhost; dbname=academico_edwintmz', 'root', '');
		$base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$base -> exec("SET CHARACTER SET utf8");
		$sql = "select * from acceso where usuario = :uso and password = :pas";
		$resultado = $base -> prepare($sql);
		$resultado -> execute(array(":uso" => $usuario, ":pas" => $pasword));
		
        $numero_registro = $resultado -> rowCount();
        $registro = $resultado -> fetch(PDO::FETCH_ASSOC);
        
		if($numero_registro == 1 and $registro['rol'] == 'estudiante'){ //para ingreso como estudiante
			session_start();
			$_SESSION["usuario"] = $usuario;
			header("location:php/estudiante.php");
		}else
		if($numero_registro == 1 and $registro['rol'] == 'docente'){ //para ingreso como docente
			session_start();
			$_SESSION["usuario"] = $usuario;
			header("location:php/docente.php");
		}else
		if($numero_registro == 1 and $registro['rol'] == 'director'){ //para ingreso como kardex
			session_start();
			$_SESSION["usuario"] = $usuario;
			header("location:php/director.php");
		}else{
			header("location:index.html");
		}
		$resultado -> closeCursor();

	} CATCH(Exception $e){
		die('Error: ' . $e -> GetMessage());
	} 
?>