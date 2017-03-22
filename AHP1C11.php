<?php
$parametro=htmlspecialchars($_POST["usuario"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT OPERARIO.id_usuario
FROM OPERARIO
INNER JOIN DIRECCION ON OPERARIO.id_usuario = DIRECCION.id_cliente
WHERE DIRECCION.ciudad = ( 
SELECT ciudad
FROM CLIENTE
INNER JOIN USUARIO ON USUARIO.id_usuario = CLIENTE.id_usuario
WHERE USUARIO.nombre like '".$parametro."%')" ;

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>id_usuario</td>
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
