<?php
$parametro=htmlspecialchars($_POST["estado"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT id_presupuesto
FROM PRESUPUESTO
WHERE estado like '".$parametro."%'" ;

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
<td><?php echo $row['id_presupuesto']; ?></td>
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
