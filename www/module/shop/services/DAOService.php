<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/';
include ($path . 'model/connect.php');
include (__DIR__ . '/../../../utils/middleware.auth.php');

class DAOService{
    
    function select_all_figures(): array
    {
        // $newToken = token('encode', $_POST['userType']);
        // var_dump($_POST['token']);
        // if ($newToken == $_POST['token']) {
        //     $sql = "SELECT *,
        //     IF((SELECT figureID FROM ".$_POST['userType'].$_POST['username']."Favorites WHERE ".$_POST['userType'].$_POST['username']." Favorites.figureID = figures.id) IS NULL, FALSE, TRUE) AS liked
        //     FROM figures;";
        // } else {
            $sql = "SELECT * FROM figures ORDER BY visits DESC";
        // }
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }

    function select_filtered_figures($filters): array
    {
        $sql = "SELECT * FROM figures WHERE ".$filters;
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        try {
            $data = [];
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        } catch (\Throwable $th) {
            $data = [];
        }

        connect::close($conexion);
        
        // var_dump(json_encode($data));
        // die();

        return $data;
    }

    function addVisits($filters): array
    {
        $sql = "UPDATE figures SET visits = visits + 1 WHERE ".$filters;
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $sql = "SELECT * FROM figures WHERE ".$filters;
        $res = mysqli_query($conexion, $sql);

        try {
            $data = [];
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        } catch (\Throwable $th) {
            $data = [];
        }

        connect::close($conexion);

        return $data;
    }

    function select_ordered_figures($filters): array
    {
        $sql = "SELECT * FROM figures ".$filters;
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        try {
            $data = [];
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        } catch (\Throwable $th) {
            $data = [];
        }

        connect::close($conexion);

        return $data;
    }

    function select_standard(): array
    {
        $sql = "SELECT * FROM figures WHERE type = 'Standard'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }

    function select_statue(): array
    {
        $sql = "SELECT * FROM figures WHERE type = 'Statue'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }

    function select_nendoroid(): array
    {
        $sql = "SELECT * FROM figures WHERE type = 'Nendoroid'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }

    function select_typed_figure($type): array
    {
        $sql = "SELECT * FROM figures WHERE type = '.$type.'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }

    function select_autocomplete($query): array
    {
        $sql = $query;
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        try {
            $data = [];
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        } catch (\Throwable $th) {
            $data = [];
        }
        connect::close($conexion);

        return $data;
    }

    function select_all_banners(): array
    {
        $sql = "SELECT * FROM images";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        connect::close($conexion);

        return $data;
    }
    
    function addLikedProduct($username, $figureName)
    {
        $sql = "UPDATE figures SET likes = likes + 1 WHERE figureName = '".$figureName."'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        connect::close($conexion);
    }

    function removeLikedProduct($username, $figureName)
    {
        $sql = "UPDATE figures SET likes = likes - 1 WHERE figureName = '".$figureName."'";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        connect::close($conexion);
    }

    function addUserLikedProduct($username, $figureName)
    {
        $sql = "INSERT INTO client".$username."Favorites (figureName) VALUES ('".$figureName."');";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        connect::close($conexion);
    }

    function removeUserLikedProduct($username, $figureName)
    {
        $sql = "DELETE FROM client".$username."Favorites WHERE figureName = '".$figureName."';";
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        connect::close($conexion);
    }
}