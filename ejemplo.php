
<?php
$string = <<<XML<book id="bk101">
   <author>Gambardella, Matthew</author>
   <title>XML Developers Guide</title>
   <genre>Computer</genre>
   <price>44.95</price>
</book>
<book id="bk102">
   <author>Ralls, Kim</author>
   <title>Midnight Rain</title>
   <genre>Fantasy</genre>
   <price>5.95</price>
</book>
XML;

$xml = new SimpleXMLElement($string);
// seach records by tag value:
// find all book records with price higher than 40$
$res = $xml->xpath('/book/pr');
print_r($res);

?>
