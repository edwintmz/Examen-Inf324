<?php
	include 'conexion.php';
	
	$pdo = new Conexion();
	
	//PARA VER LISTAR LOS REGISTRO S DE LA TABLA PERSONA
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['ci'])){
			$sql = $pdo->prepare("SELECT * FROM persona WHERE ci = :ci");
			$sql -> bindValue(':ci', $_GET['ci']);
			$sql -> execute();
			$sql -> setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 NO EXISTEN DATOS");
			echo json_encode($sql->fetchAll());
			exit;				
		} else{
			$sql = $pdo->prepare("SELECT * FROM persona");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 NO EXISTEN DATOS");
			echo json_encode($sql->fetchAll());
			exit;		
		}
	}
	
	//PARA INSERTAR UNA NUEVO REGISTRO
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "INSERT INTO persona (ci, nom_com, fec_nac, departamento) VALUES(:ci, :nombre, :fecnac, :depto)";
		$regis = $pdo->prepare($sql);
		$regis -> bindValue(':ci', $_POST['ci']);
		$regis -> bindValue(':nombre', $_POST['nombre']);
		$regis -> bindValue(':fecnac', $_POST['fecha']);
		$regis -> bindValue(':depto', $_POST['depto']);
		$regis -> execute();
		$idPost = $pdo->lastInsertId(); 
		
		if($idPost) {
			header("HTTP/1.1 200 OK");
			echo json_encode($idPost);
			exit;
		}
	}
	
	//PARA ACTUALIZAR UN REGISTRO
	if($_SERVER['REQUEST_METHOD'] == 'PUT'){		
		$sql = "UPDATE PERSONA SET nom_com = :nombre, fec_nac = :fecnac, departamento =:depto WHERE ci = :ci";
		$actua = $pdo->prepare($sql);
		$actua->bindValue(':ci', $_GET['ci']);
		$actua->bindValue(':nombre', $_GET['nombre']);
		$actua->bindValue(':fecnac', $_GET['fecha']);
		$actua->bindValue(':depto', $_GET['depto']);
		$actua->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}

	//PARA ELIMINAR UN REGISTRO
	if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$sql = "DELETE FROM persona WHERE ci = :ci";
		$elim = $pdo->prepare($sql);
		$elim -> bindValue(':ci', $_GET['ci']);
		$elim -> execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Si NO COORESPONDE A NINGUNA DE LAS ANTERIORES OPERACIONES
	header("HTTP/1.1 400 SOLICITUD INCORRECTA");
?>