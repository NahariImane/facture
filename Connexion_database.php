<?php
$connexion = mysqli_connect("localhost","root","");
  if( !$connexion) 
  { 
   echo "Desolé, connexion à localhost impossible"; 
   exit; 
  }
 if( !mysqli_select_db($connexion,'stock')) 
 { 
  echo "Désolé, accès à la base stock impossible";  
  exit;
 }
?>