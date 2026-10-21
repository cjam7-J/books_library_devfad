<?php

namespace  App\Repository;

use App\Class\Mysql;
use App\Entity\Category;
use Dom\Mysql as DomMysql;
use \PDO;
use \PDOException;

class CategoryRepository
{
    private ?PDO $connexion;
    public function __construct()
    {
       $this->connexion = Mysql::connectBdd();
    }
    public function create(Category $category): ?Category
    {
      try {

            $sql = "INSERT INTO category (name) VALUES (:categorie_name)";

            $stmt = $this->connexion->prepare($sql);

            $name = $category->getName();
            $stmt->bindValue(':category_name', $name, PDO::PARAM_STR);

            // Exécuter la requête[cite: 3]
            $stmt->execute();

            // Setter l'id à l'objet Category[cite: 3]
            $category->setId($lastId); 

            return $category;
        } catch (PDOException $e) {
            // Gestion de l'erreur en cas de besoin
            // echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
}

