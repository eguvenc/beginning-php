<!DOCTYPE html>
<html>
<body>

<?php
$xml=simplexml_load_file("note.xml");

echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;
?>  

</body>
</html>