<?php
global $pdo;
if (isset($pdo)) {
    return;
}
$pdo = new PDO("mysql:host=localhost;dbname=gestionamis;charset=utf8", "root", "");
