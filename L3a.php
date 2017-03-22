<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT Estudiante, 'SS' AS concept
FROM ZT1E3_estudiantepuntuacion
WHERE Puntuacion <5
UNION
SELECT Estudiante, 'AP' AS concept
FROM ZT1E3_estudiantepuntuacion
WHERE Puntuacion >=5 AND Puntuacion <7
UNION
SELECT Estudiante, 'NT' AS concept
FROM ZT1E3_estudiantepuntuacion
WHERE Puntuacion >=7 AND Puntuacion < 8.5
UNION
SELECT Estudiante, 'SB' AS concept
FROM ZT1E3_estudiantepuntuacion
WHERE Puntuacion > 8.5
" ;

echo "<br/>SS: si la puntuación es menor que 5.<br/>
<br/>AP: si la puntuación es mayor o igual que 5 y menor que 7.<br/>
<br/>NT: si la puntuación es mayor o igual que 7 y menor que 8,5.<br/>
<br/>SB: si la puntuación es mayor o igual que 8,5.<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Estudiante</td><td>Clasificacion</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['Estudiante']; ?></td><td><?php echo $row['concept']; ?></td>
</tr>


<?php
}

?>

</table>
<?php

$db->close();


?>
