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

        return $products;
    }

    public function getFilteredProducts($filters): array
    {
        $products = $this->daoService->select_filtered_figures($filters);

        return $products;
    }

    public function getOrderedProducts($filters): array
    {
        $products = $this->daoService->select_ordered_figures($filters);

        return $products;
    }

    public function getStandard(): array
    {
        $products = $this->daoService->select_standard();

        return $products;
    }

    public function getStatue(): array
    {
        $products = $this->daoService->select_statue();

        return $products;
    }

    public function getNendoroid(): array
    {
        $products = $this->daoService->select_nendoroid();

        return $products;
    }

    public function getTypedFigure($type): array
    {
        $products = $this->daoService->select_typed_figure($type);

        return $products;
    }

    public function autocomplete($query): array
    {
        $products = $this->daoService->select_autocomplete($query);

        return $products;
    }

    public function getBanners(): array
    {
        $products = $this->daoService->select_all_banners();

        return $products;
    }
}