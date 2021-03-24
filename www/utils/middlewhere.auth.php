<?php
    ////////////////////////////////////////////////
    //https://github.com/miguelangel-nubla/JWT-PHP//
    ////////////////////////////////////////////////
    include(__DIR__ . "/../classes/JWT.php");

    function token($action, $userType) {
        $header = '{"typ":"JWT", "alg":"HS256"}';
        $secret = 'elpsycongroo';

        //iat: Tiempo que inició el token
        //exp: Tiempo que expirará el token (+1 hora)
        //name: info user
        $payload = `{
            "iat":time(), 
            "exp":time() + (60*60),
            "userType":$userType
        }`;
        $JWT = new JWT;
        if($action == 'encode') {
            return $token = $JWT->encode($header, $payload, $secret);
        } else {
            return $json = $JWT->decode($token, $secret);
        }
    }