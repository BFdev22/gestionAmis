<?php
function register($username, $password)
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO user (username,pass) VALUES (:u, :p)");
    $query->execute([
        "u" => $username,
        "p" => $password
    ]);
    return true;
}
