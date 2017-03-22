<?php
$parametro1=htmlspecialchars($_POST["empresa"]);
$parametro2=htmlspecialchars($_POST["pesosanuales"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT ne.nombreempleado, calle, ciudad, sueldo
FROM ZT1E2_trabaja ne
INNER JOIN ZT1E2_empleado
ON ne.nombreempleado = ZT1E2_empleado.nombreempleado
WHERE ne.nombreempresa = '".$parametro1."' AND sueldo > '".$parametro2."'";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Nombre</td><td>Calle</td><td>Ciudad</td><td>Sueldo</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td><td><?php echo $row['calle']; ?></td><td><?php echo $row['ciudad']; ?></td><td><?php echo $row['sueldo']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
