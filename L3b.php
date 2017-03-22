<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT COUNT( puntuacion ) AS CantidadxClasificacion, Puntuacion
FROM ZT1E3_estudiantepuntuacion
GROUP BY puntuacion" ;

echo "<br/>Numero de estudiantes por clasificacion<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Cantidad</td><td>Puntuacion</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row[CantidadxClasificacion]; ?></td><td><?php echo $row['Puntuacion']; ?></td>
</tr>


<?php
}

?>

</table>
<?php

$db->close();


?>
