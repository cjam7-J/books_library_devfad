<?php

namespace App\Repository;

use App\Entity\User;
use PDO;

class UserRepository {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function findByEmail(string $email): ?User {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();

        return $user ? $user : null;
    }
}