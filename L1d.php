<?php

$parametro1=htmlspecialchars($_POST["modelo"]);
$parametro2=htmlspecialchars($_POST["nombre"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "DELETE ZT1E1_coche, ZT1E1_esduenio
FROM ZT1E1_coche
INNER JOIN ZT1E1_esduenio
ON ZT1E1_coche.matricula =ZT1E1_esduenio.matricula
INNER JOIN ZT1E1_persona
ON ZT1E1_persona.idconductor = ZT1E1_esduenio.idconductor
WHERE ZT1E1_coche.modelo = '".$parametro1."' AND ZT1E1_persona.nombre = '".$parametro2."'
";
$sql2 = "SELECT ZT1E1_coche.modelo, ZT1E1_persona.nombre
FROM ZT1E1_coche
INNER JOIN ZT1E1_esduenio
ON ZT1E1_coche.matricula =ZT1E1_esduenio.matricula
INNER JOIN ZT1E1_persona
ON ZT1E1_persona.idconductor = ZT1E1_esduenio.idconductor
";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result2 = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}?>


<br/>**********************************<br/>
<br/>*  Se borro satisfactoriamente   *<br/>
<br/>**********************************<br/>

<table border=1>
<tr>
<td>Modelos</td><td>Duenio</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['modelo']; ?></td><td><?php echo $row['nombre']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
