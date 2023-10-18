<?php
function createDemand($status, $id_demandeur, $id_demander)
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO demande (status,id_demandeur, id_demander) VALUES (:s, :idr, :ide)");
    $query->execute([
        "s" => $status,
        "idr" => $id_demandeur,
        "ide" => $id_demander
    ]);
    return true;
}

function getComments($id_post)
{
    // global $pdo;
    // $query = $pdo->prepare("SELECT * FROM comment  WHERE id = :i");
    // $query->bindParam(':i', $id_post);
    // $query->execute();
    // $data = $query->fetch();
    // return $data;
}
