<?php

namespace App\Entity;

class User {
    private ?int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $grant;

    // Getters pour récupérer les informations
    public function getId(): ?int {
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getGrant(): string {
        return $this->grant;
    }
}