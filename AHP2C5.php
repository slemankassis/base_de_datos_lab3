<?php
$parametro=htmlspecialchars($_POST["id_incidente"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT id_usuario
FROM OPERARIO
WHERE id_usuario
IN (  SELECT id_usuario
FROM interactua
WHERE id_incidente like '".$parametro."%')";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Usuarios</td>
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
