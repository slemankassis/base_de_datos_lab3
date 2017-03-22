<?php
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT id_incidente
FROM INCIDENTE
WHERE DATEDIFF( fecha_cierre, fecha_creacion ) >2
" ;

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




</table>
<?php

$db->close();


?>
