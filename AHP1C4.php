<?php
$parametro1=htmlspecialchars($_POST["nombre"]);
$parametro2=htmlspecialchars($_POST["apellido"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT id_incidente
FROM interactua
INNER JOIN USUARIO ON interactua.id_usuario = USUARIO.id_usuario
INNER JOIN OPERARIO ON USUARIO.id_usuario = OPERARIO.id_usuario
WHERE USUARIO.nombre like '".$parametro1."%'
AND USUARIO.apellido like '".$parametro2."%'" ;

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>id_incidente</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['id_incidente']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>




?>

</table>
<?php

$db->close();


?>
