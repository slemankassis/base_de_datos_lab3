<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT COUNT( nombreempleado ) AS cant, nombreempresa
FROM ZT1E2_trabaja emp
GROUP BY nombreempresa
ORDER BY cant DESC";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>Cantidad</td><td>Nombre de Empresa</td></tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['cant']; ?></td> <td><?php echo $row['nombreempresa']; ?></td></tr>


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
