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
<form action="L1a.php" method="POST"> 


Elije el año:
	 <select type="text" name="fecha"> 
            <option fecha="2016">2016</option>
            <option fecha="2015">2015</option>
            <option fecha="2014">2014</option>
            <option fecha="2013">2013</option>
            <option fecha="2012">2012</option>
            <option fecha="2011">2011</option>
            <option fecha="2010">2010</option>
            <option fecha="2009">2009</option>
            <option fecha="2008">2008</option>
            <option fecha="2007">2007</option>
            <option fecha="2006">2006</option>
            <option fecha="2005">2005</option>
            <option fecha="2004">2004</option>
            <option fecha="2003">2003</option>
            <option fecha="2002">2002</option>
            <option fecha="2001">2001</option>
            <option fecha="2000">2000</option>
            <option fecha="1999">1999</option>
            <option fecha="1998">1998</option>
            <option fecha="1997">1997</option>
            <option fecha="1996">1996</option>
            <option fecha="1995">1995</option>
            <option fecha="1994">1994</option>
            <option fecha="1993">1993</option>
            <option fecha="1992">1992</option>
            <option fecha="1991">1991</option>
            <option fecha="1990">1990</option>
            <option fecha="1989">1989</option>
            <option fecha="1988">1989</option>
            <option fecha="1987">1987</option>
            <option fecha="1986">1986</option>
            <option fecha="1985">1985</option>
            <option fecha="1984">1984</option>
            <option fecha="1983">1983</option>
            <option fecha="1982">1982</option>
            <option fecha="1981">1981</option>
            <option fecha="1980">1980</option>
            <option fecha="1979">1979</option>
            <option fecha="1978">1978</option>
            <option fecha="1977">1977</option>
            <option fecha="1976">1976</option>
            <option fecha="1975">1975</option>
            <option fecha="1974">1974</option>
            <option fecha="1973">1973</option>
            <option fecha="1972">1972</option>
            <option fecha="1971">1971</option>
            <option fecha="1970">1970</option>  
          </select> 
          <input type="submit" name="submit" value="ejecutar Consulta"> 
</form> 
</body> 
</html>
