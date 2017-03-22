<?php
$parametro=htmlspecialchars($_POST["fecha"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT COUNT( idconductor ) AS Accidentados
FROM ZT1E1_participo INNER JOIN ZT1E1_accidente
ON ZT1E1_participo.numeroinforme = ZT1E1_accidente.numeroinforme
WHERE EXTRACT( YEAR FROM fecha ) like '".$parametro."'
" ;

// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=1>
<tr>
<td>Accidentados</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row[Accidentados]; ?></td>
</tr>

<?php
}

?>

</table>
<?php

$db->close();


?>
