<?php
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$db->set_charset("utf8");
$sql =
"SELECT INCIDENTE.id_incidente, INCIDENTE.prioridad, DIRECCION.provincia, DIRECCION.calle, DIRECCION.altura, DIRECCION.ciudad
FROM guarda_estado
INNER JOIN INCIDENTE ON guarda_estado.id_incidente = INCIDENTE.id_incidente
INNER JOIN DIRECCION ON INCIDENTE.id_direccion = DIRECCION.id_direccion
WHERE guarda_estado.estado = 'finalizado' IS NOT 
TRUE";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Id Incidente</td><td>Prioridad</td><td>Provincia</td><td>Calle</td><td>Altura</td><td>Ciudad</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['id_incidente']; ?></td><td><?php echo $row['prioridad'];?></td><td><?php echo $row['provincia'];?></td><td><?php echo $row['calle'];?></td><td><?php echo $row['altura'];?></td><td><?php echo $row['ciudad'];?></td>
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
