<?php

include (__DIR__ . '/../services/ShopService.php');
$shopService = new ShopService();

header('Content-type: application/json');
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $where = "";
        if ($_POST['brand']) {
            if ($_POST['franchise']) {
                $where = "WHERE brand = '".$_POST['brand']."' AND franchise = '".$_POST['franchise']."';";
                echo json_encode($shopService->getFilteredProducts($where));
                die();
            } else {
                $where = "WHERE brand = '".$_POST['brand']."';";
                echo json_encode($shopService->getFilteredProducts($where));
                die();
            }
        } elseif ($_POST['franchise']) {
            $where = "WHERE franchise = '".$_POST['franchise']."';";
            echo json_encode($shopService->getFilteredProducts($where));
            die();
        }

        if($_POST['category']=="All") {
            echo json_encode($shopService->getProducts());
        } elseif ($_POST['category']=="Standard") {
            echo json_encode($shopService->getStandard());
        } elseif ($_POST['category']=="Statue") {
            echo json_encode($shopService->getStatue());
        } elseif ($_POST['category']=="Nendoroid") {
            echo json_encode($shopService->getNendoroid());
        }
        break;
    default:
        echo json_encode([
            'status' => 400,
            'message' => 'No request method specified',
        ]);
        break;
}