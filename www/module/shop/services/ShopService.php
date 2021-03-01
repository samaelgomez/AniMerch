<?php

include (__DIR__ . '/../services/DAOService.php');
include (__DIR__ . '/../exceptions/NoProductsFoundException.php');

class ShopService {

    private $daoService;

    public function __construct() {
        $this->daoService = new DAOService();
    }

    public function getProducts(): array
    {
        $products = $this->daoService->select_all_figures();

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }

    public function getFilteredProducts($filters): array
    {
        $products = $this->daoService->select_filtered_figures($filters);

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }

    public function getStandard(): array
    {
        $products = $this->daoService->select_standard();

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }

    public function getStatue(): array
    {
        $products = $this->daoService->select_statue();

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }

    public function getNendoroid(): array
    {
        $products = $this->daoService->select_nendoroid();

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }

    public function getTypedFigure($type): array
    {
        $products = $this->daoService->select_typed_figure($type);

        if(empty($products)){
            throw new NoProductsFoundException('No products found');
        }

        return $products;
    }
}