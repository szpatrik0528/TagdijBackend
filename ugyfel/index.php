<?php

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        require_once 'ugyfel/getugyfelek.php';
        break;
    case 'POST':
        require_once 'ugyfel/postugyfel.php';
        break;
    case 'DELETE':
<<<<<<< HEAD
        require_once 'ugyfel/deleteugyfelek.php';
        break;
    case 'PUT':
        require_once 'ugyfel/putugyfelek.php';
=======
        require_once 'ugyfel/deleteugyfel.php;
>>>>>>> 23a36b86046809d5871fd440ccec91e72ad97b84
        break;
    default:
        break;
}