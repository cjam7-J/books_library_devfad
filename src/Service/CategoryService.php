<?php

namespace App\Service;

// Importer la classe CategoryRepository
use App\Repository\CategoryRepository;

class CategoryService
{
     private CategoryRepository $categoryRepository;
     

      public function __construct(CategoryRepository $categoryRepository)
      {
         $this->categoryRepository = $categoryRepository;
      }
 
      public function getAllCategory(): array
     {
         return $this->categoryRepository->findAll();
     }
}
