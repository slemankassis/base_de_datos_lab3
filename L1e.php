<?php

$parametro1=htmlspecialchars($_POST["importedanios"]);
$parametro2=htmlspecialchars($_POST["numeroinforme"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "UPDATE ZT1E1_participo
SET importedanios = '$parametro1'
WHERE numeroinforme = '$parametro2'";

$sql2 = "SELECT importedanios, numeroinforme
FROM ZT1E1_participo";

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result2 = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Importe Danios</td><td>Numero de informe</td>
</tr>
<?php
while($row = $result2->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['importedanios']; ?></td><td><?php echo $row['numeroinforme']; ?></td>
</tr>


<?php
}



?>

</table>
<?php

$db->close();


?>
