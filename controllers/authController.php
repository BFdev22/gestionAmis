<?php

function showLogin()
{
    global $base_url;
    $erreur = "";
    if ($_POST && $_POST['username'] && $_POST['password']) {
        $erreur = "";
        require("models/loginModel.php");
        $check = check($_POST['username']);
        if($check){
            if(password_verify($_POST['password'], $check['pass'])){
                $_SESSION['user'] = $check;
                $GLOBALS['isConnected'] = true;
                header('Location: '.$base_url);
            } else {
                $erreur = 'username ou mot de passe incorrecte';
            }
        }else{
            $erreur = "username ou mot de passe incorrecte";
        }
    }
    require("templates/login.php");
}

function showRegister()
{
    require("models/registerModel.php");
    require("models/loginModel.php");
    $erreur = "";
    if ($_POST && $_POST['username'] && $_POST['password']) {
        $check = check($_POST['username']);
        if($check){
            echo 'cet utilisateur existe déjà !';
        }else{
            $insert = register($_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            if($insert){
                echo 'bien enregistré';
            }else{
                echo 'erreur';
            }
        }
    }
    require("templates/register.php");
}
