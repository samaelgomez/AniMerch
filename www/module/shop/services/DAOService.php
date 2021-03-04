<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/';
include ($path . 'model/connect.php');

class DAOService{
    
    function select_all_figures(): array
    {
        $sql = "SELECT * FROM figures ORDER BY visits DESC";
        
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
}