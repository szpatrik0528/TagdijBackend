<?php

// osszes ugyfel adatai json-ben
if (count($keresSzoveg) > 1) {
    if (is_int(intval($keresSzoveg[1]))) {
        $sql = 'SELECT * FROM ugyfel WHERE azon=' . $keresSzoveg[1];
    } else {
        http_response_code(404);
        echo "Nem létező ügyfél!";
    }
} else {
    $sql = 'SELECT * FROM ugyfel WHERE 1';
}
require_once './databaseconnect.php';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $ugyfelek = array();
    while ($row = $result->fetch_assoc()) {
        $ugyfelek[] = $row;
    }
    http_response_code(200);
    echo json_encode($ugyfelek);
} else {
    http_response_code(404);
    echo 'nincs egy ügyfél sem';
}