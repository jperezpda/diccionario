<?php

$db = new SQLite3('ppluis.db'); 
$sql = "SELECT ingles FROM diccionario ORDER BY ingles ASC"; 
$result = $db->query($sql);

$row = array(); 
$i = 0; 
while($res = $result->fetchArray(SQLITE3_ASSOC)) { 
    if(!isset($res['ingles'])) continue;          //    $row[$i]['id']     = $res['id']; 
    $row[$i]['ingles'] = ucfirst($res['ingles']); //    $row[$i]['espanol']=$res['espanol']; 
    $i++; 
    }

$result->finalize();
$db->close();

header('Content-Type: application/json');
echo json_encode($row);
?>

