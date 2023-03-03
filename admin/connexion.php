<?php


$mysqlDsn = 'mysql:host=localhost;dbname=resto_database';

   try{
      $pdo = new PDO($mysqlDsn, username :'root');
   }
   catch(PDOException $e){
      echo 'Impossible de se connecter à la base de donnée';
   }
?> 