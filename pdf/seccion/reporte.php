<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
         
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "registro";
        
        $conexion = new mysqli($server,$user,$pass,$db);
        
        ?>
        
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
         
    </body>
</html>
