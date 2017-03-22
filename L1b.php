<?php
$parametro=htmlspecialchars($_POST["nombre"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT COUNT( numeroinforme ) AS Accidentes
FROM ZT1E1_participo
INNER JOIN ZT1E1_persona
ON ZT1E1_participo.idconductor = ZT1E1_persona.idconductor
WHERE ZT1E1_persona.nombre like '".$parametro."'
";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Accidentes</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row[Accidentes]; ?></td>
</tr>

<?php
}

?>

</table>
<?php

$db->close();


?>
