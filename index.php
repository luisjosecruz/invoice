<?php
//for dev purposes
//fire this in browser to get the code image
/*
use Ayeo\Barcode;

require_once('vendor/autoload.php');

$builder = new Barcode\Builder();
$builder->setBarcodeType('gs1-128');
$builder->setFilename('bar.png');
$builder->setImageFormat('png');
// $builder->setWidth(700);
$builder->setHeight(75);
//$builder->setFontPath('FreeSans.ttf');
$builder->setFontSize(15);
$builder->setBackgroundColor(255, 255, 255);
$builder->setPaintColor(0,0,0);
$builder->output('41574197000082933902000000400096202105118020100112000001');
*/
/*
(415)7419700008293(3902)0000066689(96)20210303(8020)100112000001

$builder->output('41574197000082933902000006668996202103038020100112000001');
$builder->saveImage('41574197000082933902000006668996202103038020100112000001');

$builder->output('41574197000082933902000000800096202105118020100112000002');
$builder->output('41574197000082933902000000400096202105118020100112000001');
*/

// capturando la URI

require_once "config/pdo.php";

$uri = $_SERVER['REQUEST_URI'];
$uri_parts = explode('/', $uri);
array_shift($uri_parts);
$ubicacion = $uri_parts[1];

switch($ubicacion){
    case 'print':
        $fact = (isset($uri_parts[2])) ? $uri_parts[2] : "";
        require_once ('views/barras.php');
        break;
    case 'barcode':
        $fact = (isset($uri_parts[2])) ? $uri_parts[2] : "";
        require "views/barcode.php";
        break;
    case 'mandamientos':
        $comunidad = (isset($uri_parts[2])) ? $uri_parts[2] : "";
        require "views/userInv.php";
        break;
    default:
        echo $uri_parts[2];
        echo "404";
}


?>
