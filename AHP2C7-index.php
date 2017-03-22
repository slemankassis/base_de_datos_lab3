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
<form action="AHP2C7.php" method="POST"> 


Elije el año:
	 <select type="text" name="año"> 
            <option mes="2016">2016</option>
            <option mes="2015">2015</option>
            <option mes="2014">2014</option>
            <option mes="2013">2013</option>
            <option mes="2012">2012</option>
            <option mes="2011">2011</option>
            <option mes="2010">2010</option>
            <option mes="2009">2009</option>
            <option mes="2008">2008</option>
            <option mes="2007">2007</option>
            <option mes="2006">2006</option>
            <option mes="2005">2005</option>	    
          </select> 
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
Elije el dia:
	 <select type="text" name="dia"> 
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
	    <option mes="13">13</option>
            <option mes="14">14</option>
            <option mes="15">15</option>
            <option mes="16">16</option>
            <option mes="17">17</option>
            <option mes="18">18</option>
            <option mes="19">19</option>
            <option mes="20">20</option>
            <option mes="21">21</option>
            <option mes="22">22</option>
            <option mes="23">23</option>
            <option mes="24">24</option>
            <option mes="25">25</option>
            <option mes="26">26</option>
            <option mes="27">27</option>
            <option mes="28">28</option>
            <option mes="29">29</option>
            <option mes="30">30</option>
            <option mes="31">31</option>
          </select> 
          <input type="submit" name="submit" value="ejecutar Consulta"> 
</form> 
</body> 
</html>
