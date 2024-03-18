<?php
// Ellenőrizze, hogy azon paraméter meg lett-e adva a POST kérésben
if (isset($_POST["azon"])) {
    $azon = $_POST["azon"];

    // Adatbázis kapcsolat beállítása
    require_once("./databaseconnect.php");

    // SQL parancs a felhasználó törlésére az azonosító alapján
    $sql = 'DELETE FROM ugyfel WHERE azon = ?';

    // SQL parancs előkészítése és paraméterek hozzárendelése
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $azon);

    // SQL parancs végrehajtása
    if ($stmt->execute()) {
        // Ha sikeres a törlés, 200-as státuszkód küldése és üzenet kiírása
        http_response_code(200);
        echo 'Sikeres törlés';
    } else {
        // Ha sikertelen a törlés, 404-es státuszkód küldése és üzenet kiírása
        http_response_code(404);
        echo 'Sikertelen törlés';
    }
} else {
    // Ha azon paraméter nincs megadva, hibaüzenet küldése
    http_response_code(400);
    echo 'Hibás kérés: azon paraméter szükséges';
}
