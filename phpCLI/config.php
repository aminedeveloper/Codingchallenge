<?php
$servername="localhost";
$username="root";
$password="";

try 
{
    $connection=new PDO("mysql:host=$servername;dbname=laravelchallenge",$username,$password);

    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
} 
catch (PDOException $error) 
{
    echo "connection failed : ".$error->getMessage() ,"<br/>";
}
  
  
?> 