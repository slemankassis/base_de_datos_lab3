<?php
$parametro1=htmlspecialchars($_GET["fecha1"]);
$parametro2=htmlspecialchars($_GET["fecha2"]);
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT inter.id_usuario
FROM interactua inter
INNER JOIN guarda_estado ON inter.id_incidente = guarda_estado.id_incidente
WHERE estado LIKE 'Finalizado'
AND fecha_actualizacion
BETWEEN '".$parametro1."'
AND '".$parametro2."'
GROUP BY inter.id_usuario
HAVING COUNT( * ) = ( 
SELECT COUNT( id_incidente ) 
FROM guarda_estado
WHERE estado LIKE 'Finalizado'
AND fecha_actualizacion
BETWEEN '".$parametro1."'
AND '".$parametro2."' )";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Id Usuario</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['id_usuario']; ?></td>
</tr>
<?php
}

?>
</table>
<?php
$db->close();
?>
