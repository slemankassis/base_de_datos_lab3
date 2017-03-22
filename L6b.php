<?php
$parametro1=htmlspecialchars($_POST["empresa"]);
$parametro2=htmlspecialchars($_POST["porcentaje"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "UPDATE ZT1E2_trabaja
SET sueldo = sueldo + sueldo / '$parametro2'
WHERE nombreempresa = '$parametro1'";

$sql2 = "SELECT *
FROM ZT1E2_trabaja
WHERE nombreempresa = '$parametro1'";

// echo "<br/>--".$sql."--<br/>";

echo "<br/>**********************************<br/>";
echo "<br/>Se modifico con exito!<br/>";
echo "<br/>**********************************<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result2 = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
<td>Empleado</td><td>Empresa</td><td>Sueldo Actualizado</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempleado']; ?></td><td><?php echo $row['nombreempresa']; ?></td><td><?php echo $row['sueldo']; ?></td>
</tr>

<?php
}

?>

</table>
<?php

$db->close();


?>
