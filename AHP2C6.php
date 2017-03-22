<?php

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT COUNT( id_incidente ) AS cantidadincidentes, id_usuario
FROM (
SELECT id_incidente, interactua.id_usuario
FROM interactua
INNER JOIN OPERARIO ON OPERARIO.id_usuario = interactua.id_usuario
) AS opsin
GROUP BY id_usuario
ORDER BY cantidadincidentes DESC";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr><td>Cantidad de Incidentes</td><td>id_usuario</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['cantidadincidentes']; ?></td><td><?php echo $row['id_usuario']; ?></td>
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
