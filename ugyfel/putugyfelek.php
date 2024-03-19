<?php
$putdata = fopen("php://input", "r");
$raw_data= '';
while($chuck = fread($putdata, 1024))
    $raw_data .= $chuck;

fclose($putdata);
//$azon=$_POST["azon"];
$adatJSON = json_decode($raw_data);
$azon = $adatJSON->azon;
$nev = $adatJSON->nev;
$szulev = $adatJSON->szulev;
$irszam = $adatJSON->irszam;
$orsz = $adatJSON->orsz;
require_once("./databaseconnect.php");
$sql = 'UPDATE ugyfel SET nev=?, szulev=?, irszam=?, orsz=? WHERE azon=?';
$stmt = $connection->prepare($sql);
$stmt->bind_param("siisi", $nev, $szulev, $irszam, $orsz, $azon);
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen update';
} else {
    http_response_code(404);
    echo 'Sikertelen update!';
}
