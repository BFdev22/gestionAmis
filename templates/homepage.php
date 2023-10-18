<?php
$titre = "Ajouter en amis";
global $base_url;
?>
<?php ob_start(); ?>
<?php  ?>
<div class="card">
<h3>Demander en amis ?</h3>
<?php
foreach($friends as $friend){
    $isAlreadyFriend = false; // Initialisez une variable pour vérifier si l'ami est déjà dans la liste d'amis acceptés
    
    if($_SESSION['user']['username'] != $friend['username']){
        foreach($arrayAcceptDemander as $accept){
            if($accept['username'] == $friend['username']){
                $isAlreadyFriend = true; // L'ami est déjà dans la liste des amis acceptés
                break;
            }
        }
        foreach($arrayAcceptDemandeur as $accept){
            if($accept['username'] == $friend['username']){
                $isAlreadyFriend = true; // L'ami est déjà dans la liste des amis acceptés
                break;
            }
        }

        // Vérifiez aussi si la demande a déjà été envoyée
        // $isAlreadyRequested = false;
        // foreach($arrayDemand as $attente){
        //     if($attente['username'] == $friend['username']){
        //         $isAlreadyRequested = true; // La demande a déjà été envoyée
        //         break;
        //     }
        // }

        if(!$isAlreadyFriend){ // Si l'ami n'est pas déjà dans la liste des amis acceptés et que la demande n'a pas déjà été envoyée
            ?>
            <p>
                <?php echo $friend['username']?> 
                <a href="<?= $base_url ?>?page=show&id=<?= $friend['id'] ?>">Demander en amis</a>
            </p>
            <?php
        }
    }
}
?>
    <h3>Demander en attentes ?</h3>
    <?php
        foreach ($arrayDemand as $attente) {

            $isAlreadyFriend = false;

            foreach($arrayAcceptDemandeur as $accept){
                if($accept['username'] == $attente['username']){
                    $isAlreadyFriend = true;
                    break;
                }
            }

            if(!$isAlreadyFriend){ ?>
                <p>
                    <?php echo $attente['username']; ?> 
                    <a href="<?= $base_url ?>?page=showDemand&id=<?= $attente['idDemande'] ?>">Voir la demande</a>
                </p>
                <?php
            }
        }
    ?>
    
    <h3>Amis ?</h3>
    <?php
    foreach ($arrayAcceptDemander as $accept) { ?>
        <p><?php echo $accept['username'] ?>
        <?php
    }
    foreach ($arrayAcceptDemandeur as $accept) { ?>
        <p><?php echo $accept['username'] ?>
        <?php
    }
        ?>
</div>
<?php
$content = ob_get_clean();
require "layout.php";
?>