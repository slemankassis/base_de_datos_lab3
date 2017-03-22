<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT emp.nombreempleado, emp.sueldo
FROM ZT1E2_trabaja emp
INNER JOIN (
SELECT AVG( sueldo ) AS sueldoprom, nombreempresa
FROM ZT1E2_trabaja
GROUP BY nombreempresa
) AS prom
ON emp.nombreempresa = prom.nombreempresa
WHERE emp.sueldo > prom.sueldoprom";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>Nombre de empleado</td><td>Sueldo</td></tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td> <td><?php echo $row['sueldo']; ?></td></tr>


<?php
}

?>
</table>
<?php

$db->close();


?></table>
<?php

$db->close();


?>
