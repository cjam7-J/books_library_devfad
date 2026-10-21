<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function connectUser(): string {
         // 3. Vérifier que email et password sont présents dans $_POST et sont des chaînes de caractères
        if (!isset($_POST['email'], $_POST['password']) || !is_string($_POST['email']) || !is_string($_POST['password'])) {
            return "Veuillez remplir tous les champs du formulaire";
        }
        
        // 4. & 5. Récupérer l'email avec trim() et le mot de passe sans le transformer
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // 6. Si l'email ou le mot de passe est vide
        if (empty($email) || empty($password)) {
            return "Veuillez remplir tous les champs du formulaire";
        }

        // 7. Vérifier le format de l'email avec filter_var()
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Le format de l'email est invalide";
        }

        // 8. & 9. Appeler findByEmail() et vérifier si le compte existe
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            return "Email ou mot de passe incorrect";
        }

        // 10. & 11. Vérifier le mot de passe avec password_verify()
        if (!password_verify($password, $user->getPassword())) {
            return "Email ou mot de passe incorrect";
        }

        // 12. Si les identifiants sont corrects :
        // - renouveler l'identifiant de session
        session_regenerate_id(true);

        // - enregistrer dans $_SESSION["user"] les informations de l'utilisateur
        $_SESSION["user"] = [
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'grant' => $user->getGrant()
        ];

        return ""; // Retourne une chaîne vide en cas de succès (pas d'erreur)

    }
}