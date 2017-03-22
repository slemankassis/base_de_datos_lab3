<?php
$parametro=htmlspecialchars($_GET["num"]);
$parametro2=htmlspecialchars($_GET["fecha"]);
$parametro3=htmlspecialchars($_GET["lugar"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "INSERT INTO ZT1E1_accidente( numeroinforme, fecha, lugar )
VALUES ('".$parametro."', '".$parametro2."', '".$parametro3."')
";

$sql2 = "SELECT * FROM ZT1E1_accidente";

// echo "<br/>--".$sql."--<br/>";

echo "<br/>**********************************<br/>";
echo "<br/>Se agrego todo satisfactoriamente!<br/>";
echo "<br/>**********************************<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result2 = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}?>

<table border=1>
<tr>
<td>Informe</td><td>Fecha</td><td>Lugar</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['numeroinforme']; ?></td><td><?php echo $row['fecha']; ?></td><td><?php echo $row['lugar']; ?></td>
</tr>

<?php
}

?>

</table>
<?php

$db->close();


?>
