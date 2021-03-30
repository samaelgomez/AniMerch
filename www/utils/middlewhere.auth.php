<?php
    ////////////////////////////////////////////////
    //https://github.com/miguelangel-nubla/JWT-PHP//
    ////////////////////////////////////////////////
    include(__DIR__ . "/../classes/JWT.php");

    function token($action, $data) {
        $header = '{"typ":"JWT", "alg":"HS256"}';
        $secret = 'elpsycongroo';

        //iat: Tiempo que inició el token
        //exp: Tiempo que expirará el token (+1 hora)
        //name: info user
        
        $JWT = new JWT;
        if($action == 'encode') {
            $payload = '{
                "iat":'.time().', 
                "exp":'.(time() + 3600).',
                "name":"'.$data.'"
            }';

            return $token = $JWT->encode($header, $payload, $secret);
        } else {
            var_dump($JWT->decode($data, $secret));
        }
    }