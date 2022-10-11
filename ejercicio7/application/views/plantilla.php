<!Doctype html>
<html lang="es">
    <head>
        <title>EJERCICIO 7</title>
        <link href="<?php echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">
        <script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>
    </head>
    <body>        
        <div id="container">
            <!--Aquí va el contenido de las vistas-->            
            <div class="col-md-10 col-md-offset-1"> 
              <div class="row">
                <div class="col-md-12">
                  <center><h1>Ejercicio 7</h1></center>
                    <?php
                        $this->load->view($contenido);            
                    ?>                
                  </div>
                </div> 
                <footer>
                    <hr style="border-top: 1px solid #0086b3">
                    <center>
                        &copy; 2022 | edwintmz |
                    </center>
                </footer>
            </div>
        </div>
    </body>    
</html>