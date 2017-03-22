<?php
$parametro=htmlspecialchars($_POST["id_cliente"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT INCIDENTE.id_incidente, tipo
FROM interactua
INNER JOIN INCIDENTE ON INCIDENTE.id_incidente = interactua.id_incidente
WHERE interactua.id_usuario LIKE '".$parametro."'";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Incidentes</td><td>Tipo</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['id_incidente']; ?></td><td><?php echo $row['tipo']; ?></td>
</tr>
<?php
}
?>
</table>
<?php
$db->close();
?>
