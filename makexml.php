<?php
  
  $sqlCliente = "SELECT USUARIO.id_usuario, USUARIO.dni, USUARIO.nombre, USUARIO.apellido FROM USUARIO INNER JOIN CLIENTE ON CLIENTE.id_usuario = USUARIO.id_usuario";

  $sqlDireccion = "SELECT provincia, calle, altura, ciudad FROM DIRECCION WHERE id_cliente = '{var}'";

  $sqlTelefono = "SELECT telefono FROM CLIENTE_TELEFONO WHERE id_cliente = {var}";
  
  $sqlEmail = "SELECT email FROM CLIENTE_EMAIL WHERE id_cliente = {var}";
  

  $db = new mysqli('localhost', 'ddubois_grupo06', 'kemaorsl', 'ddubois_grupo06');
  if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
  }

  if(!$result = $db->query($sqlCliente)){
    die('There was an error running the query [' . $db->error . ']');
  }

?>

<?php

  $clientesXML = new SimpleXMLElement("<clientes/>");

  while($line = $result->fetch_assoc()){
    $clienteXML = $clientesXML->addChild("cliente");
    $clienteXML->addChild('id_usuario', $line['id_usuario']);
    $clienteXML->addChild('dni', $line['dni']);
    $clienteXML->addChild('nombre', $line['nombre']);
    $clienteXML->addChild('apellido', $line['apellido']);
    
    
    $conv = array("{var}" => $line['id_usuario']);
    
    $sql2 = strtr($sqlDireccion, $conv);
    if(!$result2 = $db->query($sql2)){
      die('There was an error running the query [' . $db->error . ']');
    }
    while($line2 = $result2->fetch_assoc()){
      $DireccionXML = $clienteXML->addChild("direccion");
      $DireccionXML->addChild('provincia', $line2['provincia']);
      $DireccionXML->addChild('calle', $line2['calle']);
      $DireccionXML->addChild('altura', $line2['altura']);
      $DireccionXML->addChild('ciudad', $line2['ciudad']);
    }
    
    $sql3 = strtr($sqlTelefono, $conv);
    if(!$result3 = $db->query($sql3)){
      die('There was an error running the query [' . $db->error . ']');
    }
    while($line3 = $result3->fetch_assoc()){
      $clienteXML->addChild("telefono", $line3['telefono']);
     }

    $sql4 = strtr($sqlEmail, $conv);
    if(!$result4 = $db->query($sql4)){
      die('There was an error running the query [' . $db->error . ']');
    }
    while($line4= $result4->fetch_assoc()){
      $clienteXML->addChild("email", $line4['email']);
      }
  }

  Header('Content-type: text/xml');
  echo $clientesXML->asXML('clientes.xml');

?>
