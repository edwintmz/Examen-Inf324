<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:../index.html");
    }
    echo "<div style='width: 95%;height: 100px; margin-left: 2.5%; display: flex;'>";
        echo "<div style='width: 80%; height: 70px;color: #fff; background-color: rgba(137, 24, 226, 0.925); margin-left: 2.5% 2.5% 5%;'>";
            echo "<h1>Usuario: " . $_SESSION['usuario'] . "</h1>";
        echo "</div>";
        echo "<div style='width: 20%; height: 70px; color: #fff; background-color: rgba(24, 226, 85, 0.925); margin-left: 0.5%; text-decoration: none;'>";
            echo "<a href='terminar.php'><h1>Terminar</h1></a>";
        echo "</div>";
    echo "</div>";
    echo "<h1 align ='center'>BIENVENIDO DIRECTOR</h1>";

    $us = $_SESSION['usuario'];
	try{
		$base = new PDO('mysql:host=localhost; dbname=academico_edwintmz', 'root', '');
		$base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base -> exec("SET CHARACTER SET utf8");   
        
        //desde aqui es para ver el nombre del director
        $sq = "SELECT * FROM persona WHERE ci = (SELECT ci FROM acceso WHERE usuario = '$us')"; 
        $resultad = $base -> prepare($sq);
        $resultad -> execute(array());
        $registr = $resultad -> fetch(PDO::FETCH_ASSOC);
        $resultad -> closeCursor();
        echo "<h1 align ='center'>". $registr['nom_com'] . "</h1>";

        // des de aqui es para ver el promedio de notas con case when
        echo "<div align='center' style='width: 400px; margin: auto; border: 0px solid blue; padding; 30px;'>";
        echo "<table align='center' style= 'font-size: 25px; background-color: rgba(24, 226, 85, 0.925); width: 380px; color: blue;'>";
        echo "<tr>";
        echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>Departamento</td>";
        echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>Nro. de notas</td>";
        echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>Media de notas</td>";
        echo "</tr>";

        $sql = "SELECT departamento, COUNT(notaf) as can, 
                (CASE
                    WHEN departamento = 01 THEN AVG(notaf)
                    WHEN departamento = 02 THEN AVG(notaf)
                    WHEN departamento = 03 THEN AVG(notaf)
                    WHEN departamento = 04 THEN AVG(notaf)
                    WHEN departamento = 05 THEN AVG(notaf)
                    WHEN departamento = 06 THEN AVG(notaf)
                    ELSE 'No Hay Dato'
                    END
                ) as nota
            FROM persona
            JOIN inscripcion ON persona.ci = inscripcion.ci
            GROUP BY departamento"; 
		$resultado = $base -> prepare($sql);
		$resultado -> execute(array());

        while($registro = $resultado -> fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>" . $registro['departamento'] . "</td>";
            echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>" . $registro['can'] . "</td>";
            echo "<td align='center' style= 'background-color: rgba(200, 200, 200, 1);'>" . $registro['nota'] . "</td>";
            echo "</tr>";
        }
       
		$resultado -> closeCursor();
    echo "</table>";
    echo "</div>";
	} CATCH(Exception $e){
		die('Error: ' . $e -> GetMessage());
	} 
?>