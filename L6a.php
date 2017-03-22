<?php
$parametro1=htmlspecialchars($_POST["nombre"]);
$parametro2=htmlspecialchars($_POST["direccion"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "UPDATE ZT1E1_persona
SET direccion = '$parametro2'
WHERE ZT1E1_persona.nombre = '$parametro1'
";

$sql2 = "SELECT * FROM ZT1E1_persona";

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
<td>Conductor</td><td>Nombre</td><td>Direccion</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['idconductor']; ?></td><td><?php echo $row['nombre']; ?></td><td><?php echo $row['direccion']; ?></td>
</tr>

<?php
}

?>

</table>
<?php

$db->close();


?>
