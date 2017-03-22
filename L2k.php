<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT MIN( sueldoprom ) AS Menor_sueldo_medio, nombreempresa
FROM (
SELECT AVG( sueldo ) AS sueldoprom, nombreempresa
FROM ZT1E2_trabaja
GROUP BY nombreempresa
) AS promedio";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>Menor Sueldo Medio</td><td>Nombre de Empresa</td></tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['Menor_sueldo_medio']; ?></td> <td><?php echo $row['nombreempresa']; ?></td></tr>


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
