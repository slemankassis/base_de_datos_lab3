<?php
$parametro1=htmlspecialchars($_POST["empresa"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT ne.nombreempleado, ciudad
FROM ZT1E2_trabaja ne
INNER JOIN ZT1E2_empleado
ON ne.nombreempleado = ZT1E2_empleado.nombreempleado
WHERE nombreempresa = '".$parametro1."'";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Empleados</td><td>Ciudad de residencia</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td><td><?php echo $row['ciudad']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
