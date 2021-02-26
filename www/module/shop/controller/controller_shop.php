<?php

include (__DIR__ . '/../services/ShopService.php');
$shopService = new ShopService();

header('Content-type: application/json');
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
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