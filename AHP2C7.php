<?php
$parametro1=htmlspecialchars($_POST["año"]);
$parametro2=htmlspecialchars($_POST["mes"]);
$parametro3=htmlspecialchars($_POST["dia"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT id_incidente
FROM guarda_estado
WHERE estado = 'Finalizado'
AND EXTRACT(YEAR
FROM fecha_actualizacion ) = $parametro1
AND EXTRACT(
MONTH FROM fecha_actualizacion ) = $parametro2
AND EXTRACT(
DAY FROM fecha_actualizacion ) = $parametro3";

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
