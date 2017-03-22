<?php
$parametro=htmlspecialchars($_POST["especialidad"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT INCIDENTE.id_incidente
FROM INCIDENTE
INNER JOIN interactua ON INCIDENTE.id_incidente = interactua.id_incidente
INNER JOIN OPERARIO ON interactua.id_usuario = OPERARIO.id_usuario
WHERE OPERARIO.especialidad like '".$parametro."%'" ;

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
