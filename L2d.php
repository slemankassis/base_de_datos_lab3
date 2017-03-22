<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT nel.nombreempleado
FROM ZT1E2_empleado nel
INNER JOIN ZT1E2_trabaja
ON nel.nombreempleado = ZT1E2_trabaja.nombreempleado
INNER JOIN ZT1E2_empresa
ON ZT1E2_trabaja.nombreempresa = ZT1E2_empresa.nombreempresa
WHERE nel.ciudad = ZT1E2_empresa.ciudad";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Nombre</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
