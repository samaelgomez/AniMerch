<?php

include (__DIR__ . '/../services/DAOProfile.php');
include (__DIR__ . '/../../../utils/middlewhere.auth.php');

function updateProfileSentence($userType, $profileData) {
    $query = "";
    $query = "UPDATE ".$userType.$profileData[0]." SET email = '".$profileData[1]."', pass = '".$profileData[2]."' WHERE username = '".$profileData[0]."';";
    executorNoReturn($query);
}

function listShopItems($userType, $token) {
    token('compare', $token);
}

$headers = getAllHeaders();

switch ($_POST['action']) {
    case 'list':
        listShopItems($_POST['userType'], $headers['Authorization']);
        break;

    case 'edit':
        updateProfileSentence($_POST['userType'], $_POST['profileData']);
        break;
    
    default:
        break;
    }