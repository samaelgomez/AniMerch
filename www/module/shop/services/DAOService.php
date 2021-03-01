<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/';
include ($path . 'model/connect.php');

class DAOService{
    
    function select_all_figures(): array
    {
        $sql = "SELECT * FROM figures";
        
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
        $sql = "SELECT * FROM figures ".$filters;
        
        $conexion = connect::con();
        $res = mysqli_query($conexion, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[] = $row;
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

        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['name']."</a>";
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