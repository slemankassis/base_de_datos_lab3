<?php
$parametro=htmlspecialchars($_GET["partedpto"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT *
FROM ZT1E4_departamento
WHERE lower( nombreDepartamento ) LIKE  '%".$parametro."%'";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>nombreDepartamento</td><td>edificio</td><td>presupuesto</td>
</tr>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreDepartamento']; ?></td> <td><?php echo $row['edificio']; ?></td> <td><?php echo $row['presupuesto']; ?></td> 
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


?></table>
<?php

$db->close();


?>
