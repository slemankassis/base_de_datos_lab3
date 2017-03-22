<?php
$parametro=htmlspecialchars($_POST["empresa"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT AVG( sueldo ) AS prom, nombreempresa
FROM ZT1E2_trabaja emp
GROUP BY nombreempresa
HAVING prom > (
SELECT AVG( sueldo )
FROM ZT1E2_trabaja
WHERE nombreempresa LIKE  '".$parametro."%'
) ";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>Promedio</td><td>Nombre de Empresa</td></tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['prom']; ?></td> <td><?php echo $row['nombreempresa']; ?></td></tr>


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
