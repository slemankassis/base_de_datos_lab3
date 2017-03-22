<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT emp.nombreempleado, jefes.calle, jefes.ciudad, jefes.nombrejefe
FROM (
SELECT e.nombreempleado, calle, ciudad, nombrejefe
FROM ZT1E2_empleado e
LEFT JOIN ZT1E2_jefe jf
ON e.nombreempleado = jf.nombreempleado
WHERE 1
) jefes
INNER JOIN ZT1E2_empleado emp
ON emp.nombreempleado = jefes.nombrejefe
WHERE jefes.calle = emp.calle AND jefes.ciudad = emp.ciudad";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Nombre</td><td>Calle</td><td>Ciudad</td><td>Nombre jefe</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td><td><?php echo $row['calle']; ?></td><td><?php echo $row['ciudad']; ?></td><td><?php echo $row['nombrejefe']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
