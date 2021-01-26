<?php

namespace App\services;

use App\Repositories\CategorieRepository;


class GetCategories
{
    protected $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }
    
    public function getCategories()
    {
        $categories = $this->categorieRepository->getCategories();

        return($categories);
    }
}