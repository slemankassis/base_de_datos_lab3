<?php
$parametro=htmlspecialchars($_POST["empresa"]);
// (host,user,password,database)
$db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql =  "SELECT nombreempresa
FROM (
   SELECT DISTINCT ciudad
FROM ZT1E2_empresa
WHERE nombreempresa like '".$parametro."%'
) AS c
INNER JOIN ZT1E2_empresa AS e
ON c.ciudad = e.ciudad
WHERE 1";


// echo "<br/>--".$sql."--<br/>";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}?>
<table border=2>
<tr>
<td>Nombre Empresa</td>
<?php
while($row = $result->fetch_assoc()){
?>
 <tr>
<td><?php echo $row['nombreempresa']; ?></td></tr>


<?php
}


?></table>
<?php

$db->close();


?>
