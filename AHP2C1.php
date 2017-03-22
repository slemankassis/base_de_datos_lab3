<?php
$parametro=htmlspecialchars($_POST["ciudad"]);

$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =
"SELECT id_cliente
FROM DIRECCION
WHERE ciudad LIKE '".$parametro."'";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Cliente</td
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['id_cliente']; ?></td>
</tr>
<?php
}

?>
</table>
<?php
$db->close();
?>
