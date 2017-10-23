<?php

$english = strtolower($_GET["english"]);

$db = new SQLite3('ppluis.db'); 

$sql = "SELECT espanol FROM diccionario WHERE ingles = '" . $english . "'";

$result = $db->query($sql);

$row = array(); 
$i = 0; 
while($res = $result->fetchArray(SQLITE3_ASSOC)) { 
    if(!isset($res['espanol'])) continue;
    $row[$i]['espanol']=ucfirst($res['espanol']); 
    $i++; 
    }
    
if ( $i == 0 ) {
    $row[$i]['espanol'] = "add";
}

$result->finalize();
$db->close();

header('Content-Type: application/json');
echo json_encode($row);


/*

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
$result = $conn->query("SELECT name FROM ".$obj->table." LIMIT ".$obj->limit);
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

*/




?>