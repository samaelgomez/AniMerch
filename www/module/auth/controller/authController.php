<?php

include (__DIR__ . '/../services/DAOAuth.php');

header('Content-type: application/json');

function makeCreateSentence($type, $username) {
    $query = "";
    if ($type == "client") {
        $query = "CREATE TABLE if not exists client".$username." (
            email       varchar(40) Primary Key not null,
            username    varchar(25) not null,
            pass        longtext    not null,
            avatar      longtext    not null,
            money       longtext    not null
        )";
    } elseif ($type == "shop") {
        $query = "CREATE TABLE if not exists ".$username." (
            email       varchar(40) Primary Key not null,
            brand_name  varchar(200) not null,
            username    varchar(25),
            pass        longtext,
            avatar      longtext,
            FOREIGN KEY (brand_name) REFERENCES shops(shopName)
       )";
    }
    return $query;
}

function makeInsertSentence($type, $name, $data) {
    $query = "";
    $columns = "";

    if ($type == "client") {
        $columns = "email, username, pass, avatar, money";
    } elseif ($type == "shop") {
        $columns = "email, brandName, username, pass, avatar";
    }

    $arrayCount = count($data);
    $query = "INSERT INTO ".$type.$name." (".$columns.") VALUES (";

    for ($i=0; $i < $arrayCount; $i++) {
        $query = $query."'".$data[$i]."'";
        if($i+1 === $arrayCount) {
            $query = $query.");";
        } else {
            $query = $query.",";
        }
    }

    return $query;
}

function makeSelectSentence($type, $name, $column=" * ", $where=false) {
    $query = "";
    
    $query = "SELECT".$column."FROM ".$type.$name;
    if($where) {
        $query = $query.' WHERE '.$where.'";';
    }

    return $query;
}

function registerUser($data) {
    $exists = executor(makeSelectSentence($data[0], $data[1][1]));

    if ($exists == null) {
        $createOK = executorNoReturn(makeCreateSentence($data[0], $data[1][1]));
        if (!$createOK) {
            echo json_encode("That user could not be created...");
            die();
        }
        $insertOK = executorNoReturn(makeInsertSentence($data[0], $data[1][1], $data[1]));
        if (!$insertOK) {
            echo json_encode("That user could not be inserted...");
            die();
        }
        return [$data[0], $data];
    } else {
        echo json_encode("That user already exists...");
        die();
    }
        
}

function loginUser($data) {
    $exists = executor(makeSelectSentence($data[0], $data[1][0], ' * ', 'username = "'.$data[1][0].'" AND pass = "'.$data[1][1]));
    if (count($exists) == 0) {
        return 'Username or password not entered correctly';
    } else {
        return [$data[0], $exists];
    }
}

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        if ($_POST['authPetition'] == 'register') {
            echo json_encode(registerUser($_POST['data']));
            die();
        }
        if ($_POST['authPetition'] == 'login') {
            echo json_encode(loginUser($_POST['data']));
            die();
        }
        break;
    }