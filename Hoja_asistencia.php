<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" type="text/css" href="dimension.css"/>
         
         
         
    </head>
    <body>
  

    
        <?php
        // put your code here
        
        ob_start();
       
         $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "registro";
          
      $conexion = new mysqli($server,$user,$pass,$db);

      
      

      
        ?>
       

       
         <script>
         
         
         function doSearch()

        {

            const tableReg = document.getElementById('datos');

            const searchText = document.getElementById('searchTerm').value.toLowerCase();

            let total = 0;

 

            // Recorremos todas las filas con contenido de la tabla

            for (let i = 1; i < tableReg.rows.length; i++) {

                // Si el td tiene la clase "noSearch" no se busca en su cntenido

                if (tableReg.rows[i].classList.contains("noSearch")) {

                    continue;

                }

 

                let found = false;

                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

                // Recorremos todas las celdas

                for (let j = 0; j < cellsOfRow.length && !found; j++) {

                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();

                    // Buscamos el texto en el contenido de la celda

                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {

                        found = true;

                        total++;

                    }

                }

                if (found) {

                    tableReg.rows[i].style.display = '';

                } else {

                    // si no ha encontrado ninguna coincidencia, esconde la

                    // fila de la tabla

                    tableReg.rows[i].style.display = 'none';

                }

            }

 

            // mostramos las coincidencias

            const lastTR=tableReg.rows[tableReg.rows.length-1];

            const td=lastTR.querySelector("td");

            lastTR.classList.remove("hide", "red");

            if (searchText == "") {

                lastTR.classList.add("hide");

            } else if (total) {

                
            } else {

               
            }

        }
         
         
         
         
         </script>
        
        
             
        
        
        
        
         <div> <!-- Etiqueta base que contiene todo el formulario-->
        <div class="conteiner"></div> <!-- Etiqueta del bloque azul de la parte superior-->
        <div class="titulo"><img class="imagen_titulo" src="Captura de pantalla 2024-05-08 215709.png" alt="alt"/></div> <!-- Etiqueta de logos del hospital Santa Maria-->
        
        <div class="Menu" > 
            
            <a href="index.php"><input class="menu1" type="submit" value="Regisro"  /></a>
            <input class="menu2" type="submit" value="Hoja de asistencia"  />
        
        </div>
        
         <h1 class="subtitulo1"><div>Hoja de asistencia de empleados </div></h1> <!-- Titulo-->
         
         <div class="mostrar_cedula"> Buscar:</div>
         
         <form>

              <input id="searchTerm" type="text" onkeyup="doSearch()" class="mostrar_cedula_txt" placeholder="Ingresar cédula"/>

    </form>
         
        
         <a href="pdf/seccion/reporte.php"><input class="boton_pdf" type="submit" value=" Imprimir PDF" " /></a>
      
            
         
         <table border="1" class="tabla" id="datos">
		<tr>
			<td>Cedula</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rol</td>
			<td>Fecha</td>
                        <td>Horario de entrada</td>
                        <td>Horario de salida</td>
		</tr>

		<?php 
		
           
                  
              
                
                $sql= "Select * from registro_asistencia ";
		
                
                
                
                $result=mysqli_query($conexion,$sql);
                
                

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['cedula'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['apellido'] ?></td>
			<td><?php echo $mostrar['rol'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td> 
			<td><?php echo $mostrar['hora_entrada'] ?></td>
                        <td><?php echo $mostrar['hora_salida'] ?></td>
		</tr>
                
                <tr class='noSearch hide'>

                <td colspan="5"></td>

            </tr>
	<?php 
	}
        
       
        
	 ?>
	</table>
         
         
        
         
     <?php 
        

        
        $html = ob_get_clean();
        echo $html;
        require_once '../hospital/pdf/autoload.inc.php';
        use Dompdf\Dompdf;
        
        $Dompdf =new Dompdf();
        
        $options = $Dompdf->getOptions();
        $options -> set(array('isRemoteEnabled' => true));
        $Dompdf ->setOptions($options);
        
        $Dompdf ->loadHtml($html);
        
        $Dompdf ->setPaper('letter');
        
        $Dompdf ->render();
        
        

    ?>
    
    
     </body>
</html>
