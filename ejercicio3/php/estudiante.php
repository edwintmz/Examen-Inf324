<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("location:../index.html");
    }
    echo "<div style='width: 95%;height: 100px; margin-left: 2.5%; display: flex;''>";
        echo "<div style='width: 80%; height: 70px;color: #fff; background-color: rgba(37, 24, 226, 0.925); margin-left: 2.5% 2.5% 5%;'>";
            echo "<h1>Usuario: " . $_SESSION['usuario'] . "</h1>";
        echo "</div>";
        echo "<div style='width: 20%; height: 70px; color: #fff; background-color: rgba(24, 226, 85, 0.925); margin-left: 0.5%; text-decoration: none;'>";
            echo "<a href='terminar.php'><h1>Terminar</h1></a>";
        echo "</div>";
    echo "</div>";
    echo "<h1 align ='center'>BIENVENIDO ESTUDIANTE</h1>";
?>