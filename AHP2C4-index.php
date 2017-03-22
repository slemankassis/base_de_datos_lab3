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
<title>Documento sin título</title> 
</head> 

<body> 
<form action="AHP2C4.php" method="POST"> 


Elije el mes:
	 <select type="text" name="mes"> 
            <option mes="01">1</option>
            <option mes="02">2</option>
            <option mes="03">3</option>
            <option mes="04">4</option>
            <option mes="05">5</option>
            <option mes="06">6</option>
            <option mes="07">7</option>
            <option mes="08">8</option>
            <option mes="09">9</option>
            <option mes="10">10</option>
            <option mes="11">11</option>
            <option mes="12">12</option>	    
          </select> 
          <input type="submit" name="submit" value="ejecutar Consulta"> 
</form> 
</body> 
</html>
