<?php
    $nivel = "../css/estilo.css";
    include "../templates/cabeza.php";
    include "../templates/menu1.php";
?>

		<!-- desde aqui es el cuerpo de la pagina -->
		<main>
			
			<!-- desde aqui es el encabezado de la pagina -->
			<section id="bienvenidos"><br><br>
				<h2><b>BIENVENIDO A LA CARRERA DE INFORMATICA</b></h2>
				<p class="contenedor"><h2>El lugar destinado al aprendizaje y desarrollo tecnológico</h2></p>  
			</section>
			<!-- hasta aqui es el encabezado de la página -->
			
			<!-- desde aqui el blog de la pagina -->
            <section id="blog">
				<div class="contenedor">
					<article>
						<img src="../img/info.jpg">
					</article>
					<article>
						<img src="../img/info1.jpg">
					</article>
				</div>
			</section>
			<!-- hasta aqui es el blog de la pagina -->
       </main>
		<!-- hasta aqui es el cuerpo de la pagina -->
		
<?php
    include "../templates/footer.php";
?>