<?php
$parametro=htmlspecialchars($_POST["empresa"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT guarda_estado.id_incidente
FROM guarda_estado
INNER JOIN interactua ON guarda_estado.id_incidente = interactua.id_incidente
INNER JOIN USUARIO ON USUARIO.id_usuario = interactua.id_usuario
WHERE guarda_estado.estado = 'en progreso'
AND USUARIO.nombre like '".$parametro."%'" ;

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




</table>
<?php

$db->close();


?>
