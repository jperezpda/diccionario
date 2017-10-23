<?php

$textIngles  = trim(strtolower($_POST['textIngles']));
$textEspanol = trim(strtolower($_POST['textEspanol']));
$modo        = trim(strtolower($_POST['modo']));

$db = new SQLite3('ppluis.db'); 


if ( $modo == "add" ) {
    $sql = "INSERT INTO diccionario (espanol, ingles) values ('" . $textEspanol . "' , '" . $textIngles . "')";    
} else {
    $sql = "UPDATE diccionario set espanol = '" . $textEspanol . "' WHERE ingles = '" . $textIngles . "'";
}

$db->exec($sql);

$db->close();

?>