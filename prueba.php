<?php

$db = new SQLite3('ppluis.db'); 
$sql = "SELECT * FROM diccionario"; 
$result = $db->query($sql);

$row = array(); 
$i = 0; 
while($res = $result->fetchArray(SQLITE3_ASSOC)) { 
    if(!isset($res['id'])) continue;
    $row[$i]['id']     = $res['id']; 
    $row[$i]['ingles'] = $res['ingles']; 
    $row[$i]['espanol']=$res['espanol']; 
    $i++; 
    }
    echo json_encode($row);
?>

