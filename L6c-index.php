<?php 
$servidor = "localhost"; 
$usuario_bd = "ddubois_grupo06";  
$password_bd = "kemaorsl";  
$basedatos = "ddubois_grupo06";  


$conexion = mysql_connect($servidor,$usuario_bd,$password_bd); 
if (!$conexion) 
{ 
    echo "Error conectando a la base de datos."; 
    exit(); 
} 

$resultado=mysql_select_db($basedatos,$conexion); 
if (!$resultado) 
{ 
    echo "Error seleccionando la base de datos."; 
    exit(); 
} 
?> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Documento sin t&iacute;tulo</title> 
</head> 

<body> 
<form action="L6c.php" method="POST"> 


Actualizar sueldo a los jefes de la empresa:
	 <select type="text" name="nombre"> 
            <?php  
              $cod_ve = array(); 
              $cod_vn = array(); 
             // $c = 0; 
              $consulta= "SELECT nombreempresa FROM ZT1E2_empresa"; 
                 $resultado = mysql_query($consulta) or die('La consulta fall&oacute;: ' . mysql_error()); 
               
              while($linea = mysql_fetch_array($resultado)){ 
          
               
               echo " <option nombre=\"".$linea[0]."\">".$linea[0]."</option>\n"; 

              }
              ?> 
          </select> 
<br>aumento del %: <input type="text" name="porcentaje">
          <input type="submit" name="submit" value="ejecutar Consulta"> 
</form> 
</body> 
</html>
