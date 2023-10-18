<?php

function getFriends()
{
    global $pdo;
    $query = $pdo->query("SELECT * FROM user");
    $data = $query->fetchAll();
    return $data;
}

function getDemands($id_demander)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM demande WHERE status = 0 AND id_demander = :idd");
    $query->bindParam(":idd", $id_demander);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function getDemandsByDemandeur($id_demandeur)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM demande WHERE id_demandeur = :idd");
    $query->bindParam(":idd", $id_demandeur);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function getDemand($idDemand)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM demande WHERE id = :i");
    $query->bindParam(":i", $idDemand);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function updateDemand($idDemand)
{
    global $pdo;
    $query = $pdo->prepare("UPDATE demande SET status = 1 WHERE id = :i");
    $query->bindParam(":i", $idDemand);
    $query->execute();
    return true;
}

function getFriend($id)
{
    global $pdo;
    $query = $pdo->prepare("SELECT id, username FROM user  WHERE id = :i");
    $query->bindParam(':i', $id);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function getFriendAccept($id_demander)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM demande WHERE status = 1 AND id_demander = :idd");
    $query->bindParam(":idd", $id_demander);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function getFriendAcceptDemandeur($id_demandeur)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM demande WHERE status = 1 AND id_demandeur = :idd");
    $query->bindParam(":idd", $id_demandeur);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}