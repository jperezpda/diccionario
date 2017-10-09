<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('ppluis.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened successfully\n";
   }

   $sql ="SELECT * FROM diccionario";
   $ret = $db->query($sql);
   $db->close();
   
   echo json_encode($ret);
?>