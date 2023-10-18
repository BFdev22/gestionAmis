<?php
function login($username, $password)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM user  WHERE username = :u AND pass = :p");
    $query->bindParam(':u', $username);
    $query->bindParam(':p', $password);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function check($username){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM user WHERE username = :u');
    $query->bindParam(':u', $username);
    $query->execute();
    $data = $query->fetch();
    return $data;
}
