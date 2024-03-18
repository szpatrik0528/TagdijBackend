<?php
$azon=$_POST["azon"];
$nev=$_POST["nev"];
$szulev=$_Post["szulev"];
$irszam=$_Post["irszam"];
$orsz=$_Post["orsz"];
require_once("./databaseconnect.php");
$sql ='INSERT INTO ugyfel(azon, nev, szulev, irszam, orsz) VALUES (?,?,?,?,?)';
$stmt = $connection->prepare($sql);
$stmt->bind_param("isiis", $azon, $nev, $szulev, $irszam, $orsz);
if($stmt->execute()){
    http_response_code(201);
    echo 'Sikeresen hozzáadva';
}else{
    http_response_code(404);
    echo 'Sikertelen hozzáadás!';
}