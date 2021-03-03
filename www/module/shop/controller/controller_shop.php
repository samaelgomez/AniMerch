<?php

include (__DIR__ . '/../services/ShopService.php');
$shopService = new ShopService();

header('Content-type: application/json');
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        echo json_encode($shopService->getBanners());
        break;
    case 'POST':
        if ($_POST['query']) {
            $inpText = $_POST['query'];
            $query = "SELECT * FROM figures WHERE name LIKE '%$inpText%'";
            echo json_encode($shopService->autocomplete($query));
            die();
        }

        if ($_POST['fname']) {
            $where = "name = '".$_POST['fname']."';";
            echo json_encode($shopService->getFilteredProducts($where));
            die();
        }

        if ($_POST['upfname']) {
            $where = "name = '".$_POST['upfname']."';";
            echo json_encode($shopService->addVisit($where));
            die();
        }

        if ($_POST['order']) {
            $order = "ORDER BY visits DESC";
            echo json_encode($shopService->getOrderedProducts($order));
            die();
        }

        if ($_POST['petition']) {
            if ($_POST['petition'] == " ") {
                echo json_encode($shopService->getProducts());
            } else {
                echo json_encode($shopService->getFilteredProducts($_POST['petition']));
            }
            
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