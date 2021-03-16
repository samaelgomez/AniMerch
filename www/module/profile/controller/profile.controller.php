<?php

include (__DIR__ . '/../services/DAOProfile.php');

function updateProfileSentence($userType, $profileData) {
    $query = "";
    $query = "UPDATE ".$userType.$profileData[0]." SET email = '".$profileData[1]."', pass = '".$profileData[2]."' WHERE username = '".$profileData[0]."';";
    executorNoReturn($query);
}

updateProfileSentence($_POST['userType'], $_POST['profileData']);