<?php

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$db->set_charset("utf8");
$sql =
"SELECT COUNT( id_presupuesto ) AS cantidad_presupuestos, EXTRACT( 
MONTH FROM fecha_caducidad ) AS Mes, EXTRACT( YEAR
FROM fecha_caducidad ) AS Año
FROM PRESUPUESTO
WHERE estado =  'finalizado' IS NOT 
TRUE 
GROUP BY EXTRACT( 
YEAR_MONTH FROM fecha_caducidad ) ";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Presupuestos a vencer</td><td>Mes</td><td>Año</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['cantidad_presupuestos']; ?></td> <td><?php echo $row['Mes'];?></td><td><?php echo $row['Año'];?></td>
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
