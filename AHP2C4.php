<?php
$parametro=htmlspecialchars($_POST["mes"]);
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$db->set_charset("utf8");
$sql =
"SELECT SUM( monto ) AS monto_total, EXTRACT( YEAR
FROM fecha_creacion ) AS año
FROM PRESUPUESTO
WHERE EXTRACT( 
MONTH FROM fecha_creacion ) = '".$parametro."'
GROUP BY EXTRACT( YEAR
FROM fecha_creacion )  ";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
  <td>Monto Total</td><td>Año</td>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>
<tr>
  <td><?php echo $row['monto_total']; ?></td><td><?php echo $row['año'];?></td>
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
