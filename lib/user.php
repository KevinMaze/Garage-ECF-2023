<?php 


// fonction qui vérifie si user existe
function verifyUserloginPassword(PDO $pdo, string $email, string $password):array|bool
{
    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    // verification du hash mot de passe
    if ($user && password_verify($password, $user["password"])) {
        return $user;
    }else {
        return false;
    }
}