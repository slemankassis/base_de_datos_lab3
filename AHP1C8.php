<?php
$parametro=htmlspecialchars($_POST["ciudad"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT OPERARIO.id_usuario
FROM OPERARIO
INNER JOIN trabaja ON OPERARIO.id_usuario = trabaja.id_usuario
INNER JOIN SUCURSAL ON SUCURSAL.id_sucursal = trabaja.id_sucursal
WHERE SUCURSAL.ciudad like '".$parametro."%'" ;

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
<td><?php echo $row['id_usuario']; ?></td>
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
