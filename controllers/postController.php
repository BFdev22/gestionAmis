<?php
function showDemand($id)
{
    require("models/postModel.php");
    global $base_url;

    $demand = getDemand($id);
    $demandeur = getFriend($demand['id_demandeur']);

    if(isset($_POST['accepter'])){
        $accept = updateDemand($id);
        if($accept){
            echo 'Demande accepter';
            header('Location: '. $base_url);
        }else{
            echo 'Erreur';
        }
    }
    require("templates/post.php");
}

function showFriends()
{
    // TODO : Afficher tous les posts
    require("models/postModel.php");

    $allDemands = getDemandsByDemandeur($_SESSION['user']['id']);
    $arrayDemandeur = [];
    foreach($allDemands as $demands){
        $array = getFriend($demands['id_demander']);
        array_push( $arrayDemandeur, $array);
    }
    $friendAcceptDemandeur = getFriendAcceptDemandeur($_SESSION['user']['id']);
    $arrayAcceptDemandeur = [];
    foreach($friendAcceptDemandeur as $accept){
        $array = getFriend($accept['id_demander']);
        array_push($arrayAcceptDemandeur, $array);
    }

    $demands = getDemands($_SESSION['user']['id']);
    $arrayDemand = [];
    foreach($demands as $demand){
        $array = getFriend($demand['id_demandeur']);
        $array['idDemande'] = $demand['id'];
        array_push($arrayDemand, $array);
    }
    $friends = getFriends();

    $friendAcceptDemander = getFriendAccept($_SESSION['user']['id']);
    $arrayAcceptDemander = [];
    foreach($friendAcceptDemander as $accept){
        $array = getFriend($accept['id_demandeur']);
        array_push($arrayAcceptDemander, $array);
    }
    require("templates/homepage.php");
       
}

function showFriend($id)
{
    global $base_url;

    require("models/postModel.php");
    require("models/commentModel.php");
    
    $friend = getFriend($id);

    if(isset($_POST['submitDemand'])){
        $insert = createDemand(0, $_SESSION['user']['id'], $id);
        if($insert){
            echo 'bien ajouté';
            header('Location: '.$base_url);
        }else{
            echo 'erreur';
        }
    }
    require("templates/showPost.php");

}
