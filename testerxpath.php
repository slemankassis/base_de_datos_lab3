<?php
$xml = simplexml_load_file("clientes.xml");
$xpathexpression = htmlspecialchars($_GET['xpathinput']);
$result = $xml->xpath("$xpathexpression");
print_r($result);
?>