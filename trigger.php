<?php
$id=htmlspecialchars($_GET["id"]);
$prioridad=htmlspecialchars($_GET["prioridad"]);
$estado=htmlspecialchars($_GET["estado"]);
$comentario=htmlspecialchars($_GET["comentario"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = " UPDATE INCIDENTE
set prioridad = '$prioridad', estado = '$estado', comentario = '$comentario'
WHERE id_incidente = $id" ;

/* trigger:
AFTER UPDATE ON INCIDENTE 
FOR each ROW INSERT INTO guarda_estado
SET id_incidente = OLD.id_incidente,
prioridad = NEW.prioridad,
estado = NEW.estado,
comentario = NEW.comentario,
fecha_actualizacion = CURRENT_TIMESTAMP */


$sql2 = " SELECT id_incidente, prioridad, estado, comentario, fecha_actualizacion
FROM guarda_estado
where id_incidente = $id";


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result2 = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>id_incidente</td><td>prioridad</td><td>estado</td><td>comentario</td><td>fecha_actualizacion</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['id_incidente']; ?></td><td><?php echo $row['prioridad']; ?></td><td><?php echo $row['estado']; ?></td>
<td><?php echo $row['comentario']; ?></td><td><?php echo $row['fecha_actualizacion']; ?></td>
</tr>
<?php
}

?>

</table>
<?php

$db->close();

?>

