<?php
$parametro=htmlspecialchars($_POST["ciudad"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT id_usuario, nombre, apellido
FROM USUARIO
INNER JOIN (
SELECT DISTINCT id_cliente
FROM DIRECCION
WHERE ciudad LIKE '".$parametro."' IS NOT
TRUE
) AS clientes ON USUARIO.id_usuario = clientes.id_cliente
WHERE 1 ";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Cliente</td><td>Nombre</td><td>Apellido</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['id_usuario']; ?></td><td><?php echo $row['nombre']; ?></td><td><?php echo $row['apellido']; ?></td>
</tr>
<?php
}
?>
</table>
<?php
$db->close();
?>
