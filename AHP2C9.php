<?php
$parametro1=htmlspecialchars($_GET["fecha1"]);
$parametro2=htmlspecialchars($_GET["fecha2"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$db->set_charset("utf8");
$sql = "SELECT COUNT( id_evento ) AS CantArchivo, EXTRACT( 
MONTH FROM fecha ) AS Mes, EXTRACT( YEAR
FROM fecha ) AS Año
FROM ARCHIVO
GROUP BY EXTRACT( 
YEAR_MONTH FROM fecha ) ";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Cantidad de Archivos</td><td>Mes</td><td>Año</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['CantArchivo']; ?></td><td><?php echo $row['Mes']; ?></td><td><?php echo $row['Año']; ?></td>
</tr>
<?php
}

?>
</table>
<?php
$db->close();
?>
</table>
<?php
$db->close();
?>
</table>
<?php
$db->close();
?>
