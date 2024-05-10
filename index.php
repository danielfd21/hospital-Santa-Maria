<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8"> 
        <title></title>
        <link rel="stylesheet" type="text/css" href="dimension.css"/>
       <script type="text/javascript" src="file.js"></script>
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>
        <?php
       



        
        
        $server = "localhost";
        $user = "root";
        $pass = "";
        $db = "registro";
        
        $conexion = new mysqli($server,$user,$pass,$db);
        
        
     
        
       
          if(isset($_POST['reg'])){
        
        if(strlen($_POST['Cedula']) >=   1 && 
           strlen($_POST['Nombre']) >=   1 &&
           strlen($_POST['Apellido']) >=   1 &&
           strlen($_POST['Rol']) >=   1   &&
           strlen($_POST['Fecha']) >=   1  &&
           strlen($_POST['Hora_entrada']) >=   1  &&
           strlen($_POST['Hora_salida']) >=   1       
               
                
                
                ) {
            
            $cedula = trim($_POST['Cedula']);
            $nombre = trim($_POST['Nombre']);
            $apellido = trim($_POST['Apellido']);
            $Rol = trim($_POST['Rol']);
            $fecha = trim($_POST['Fecha']);
            $hora_entrada = trim($_POST['Hora_entrada']);
            $hora_salida = trim($_POST['Hora_salida']);
            
            $consulta = "INSERT INTO registro_asistencia (cedula , nombre , apellido , rol, fecha , hora_entrada , hora_salida) VALUES('$cedula','$nombre','$apellido', '$Rol' , '$fecha','$hora_entrada','$hora_salida' )";
            
            
            $resultado = mysqli_query($conexion, $consulta);
            
            
            if($resultado){
            
                
                
                 ?> 
       
               <script>
        
      var respuesta = alert("Registro exitoso");        
        
       
        
        
        </script>
                     
                     <?php
        
            }else{
                 ?> 
                     
             <script>
        
      var respuesta = alert("Ha ocurrido un problema, Intentelo mas tarde");        
        
       
        
        
        </script>
                     
                     <?php
            }
            
        } else{
             ?> 
                     
              <script>
        
      var respuesta = alert("Por favor llenar todos los campos");        
        
       
        
        
        </script>
                     
                     <?php
        }
        
          
          }  
     
        ?>
             
              <script>
        
        function confirmacion(){
            var  respuesta = confirm("¿Desea confirmar el registro?");
            if(respuesta == true){
                return true;
            }else{
                return false;
            }
        } 
        
        
       
        
        
        </script>
             
             
        <div> <!-- Etiqueta base que contiene todo el formulario-->
        <div class="conteiner"></div> <!-- Etiqueta del bloque azul de la parte superior-->
        <div class="titulo"><img class="imagen_titulo" src="Captura de pantalla 2024-05-08 215709.png" alt="alt"/></div> <!-- Etiqueta de logos del hospital Santa Maria-->
        
        <div class="Menu" > 
            
            <input class="menu1" type="submit" value="Registro" />
            <a href="Hoja_asistencia.php"><input class="menu2" type="submit" value="Hoja de asistencia"  /></a> 
        
        </div> <!-- Etiqueta del bloque azul de la parte inferior-->
        
        <h1 class="subtitulo1"><div>Registro de asistencia de empleados </div></h1> <!-- Titulo-->
      <form method="post">
          <div class="panel1">
              
        <div class="bloque1">
        <h4><div class="cedula" >Cédula</div></h4>
        <h4><div class="cedula" >Nombre</div></h4><!-- comment --> 
        <h4><div class="cedula" >Apellido</div></h4><!-- comment --> 
        <h4><div class="cedula" >Rol del empleado</div></h4><!-- comment -->    
        </div>
        
         <div class="bloque1_input">
             <h4><input class="cedula" name="Cedula" placeholder="Ingrese su cédula"></h4><!-- comment -->
             <h4><input class="cedula" name="Nombre" placeholder="Ingrese su nombre"></h4><!-- comment -->
             <h4><input class="cedula" name="Apellido" placeholder="Ingrese su apellido"></h4><!-- comment -->
             <h4><input class="cedula" name="Rol" placeholder="Ingrese su rol de empleado"></h4><!-- comment -->
        </div>
        
      
            </div>
        
        
        
        
                
                
                
                
           
        <div class="panel2">
        <div class="bloque2">
        <h4><div class="cedula" >Fecha</div></h4><!-- comment -->
        <h4><div class="cedula" >Hora de entrada</div></h4>
        <h4><div class="cedula" >Hora de salida</div></h4>
        </div>
        
            
         <div class="bloque2_input">
             <h4><input class="cedula" name="Fecha" placeholder="2000/01/01"></h4><!-- comment -->
             <h4><input class="cedula" name="Hora_entrada" placeholder="00:00"></h4><!-- comment -->
             <h4><input class="cedula" name="Hora_salida" placeholder="00:00"></h4><!-- comment -->
            
        </div>
       </div> 
      
        <div>
            
            <input class="boton" type="submit" value="Registrar" name="reg" onclick='return confirmacion()'/>
        </div>
         </form>
        </div>
        
    </body>
</html>
