<?php
$parametro1=htmlspecialchars($_POST["fecha1"]);
$parametro2=htmlspecialchars($_POST["fecha2"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT COUNT( guarda_estado.id_incidente ) 
FROM guarda_estado
INNER JOIN INCIDENTE ON guarda_estado.id_incidente = INCIDENTE.id_incidente
INNER JOIN DIRECCION ON INCIDENTE.id_direccion = DIRECCION.id_direccion
INNER JOIN CLIENTE ON DIRECCION.id_cliente = CLIENTE.id_usuario
WHERE guarda_estado.fecha_actualizacion
BETWEEN '".$parametro1."'
AND '".$parametro2."'
GROUP BY DIRECCION.id_direccion";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Id Incidente</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['COUNT( guarda_estado.id_incidente )']; ?></td>
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
