<!DOCTYPE html>
<!--
fogadja az url kéréseket és megválaszolja azokat
GET http://localhost/TagdijBackend/index.php?ugyfel -> minden ugyfel
GET http://localhost/TagdijBackend/index.php?ugyfel/(id) -> adott id ugyfel
POST http://localhost/TagdijBackend/index.php?ugyfel -> létrehoz ugyfelet
PUT http://localhost/TagdijBackend/index.php?ugyfel/{id} -> modosit adott ugyfelet
DELETE http://localhost/TagdijBackend/index.php?ugyfel/{id} -> torol adott ugyfelet
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Tagdíj Backend</title>
</head>

<body>
    <pre>
        <?php
        //var_dump($_SERVER['REQUEST_METHOD']);
        //var_dump($_SERVER['QUERY_STRING']);
        $keresSzoveg = explode('/', $_SERVER['QUERY_STRING']);
        if ($keresSzoveg[0] === 'ugyfel') {
            require_once 'ugyfel/index.php';
        } else {
            http_response_code(404);
            echo "nincs ilyen api";
        }
        ?>
        </pre>
</body>

</html>