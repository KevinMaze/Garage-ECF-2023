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

// Ajout d'un user
function addUser(PDO $pdo, string $lastname, string $firstname, string $email, string $password, string $role):bool
{
    $query = $pdo->prepare("INSERT INTO user (lastname, firstname, email, password, role) VALUE (:lastname, :firstname, :email, :password, :role)");

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":password", $password, PDO::PARAM_STR);
    $query->bindValue(":role", $role, PDO::PARAM_STR);

    return $query->execute();

}

// récupération de la table user
function getUser(PDO $pdo, int $limit = null, int $page = null):array|bool
{
    $sql = "SELECT * FROM user";

    if($limit && !$page){
        $sql .=" LIMIT :limit";
    }
    if($page){
        $sql .=" LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if($limit){
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);    
    }
    if($page){
        $offset = ($page - 1) * $limit;
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

// recupération avec id
function getUserById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM user WHERE user_id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

//récupération user total
function getTotalPageUser(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) FROM user";
    $query = $pdo->prepare($sql);
    $query->execute();
    $nbPageUser = $query->fetchAll(PDO::FETCH_ASSOC);
    return $nbPageUser["0"]["COUNT(*)"];
}

//delete user
function deleteUser(PDO $pdo, int $id):bool
{
    $query = $pdo->prepare("DELETE FROM user WHERE user_id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    if($query->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}

// modification user
function changeUser(PDO $pdo, string $lastname, string $firstname, string $email, string $password, string $role, int $id):bool
{
    $query = $pdo->prepare("UPDATE user SET lastname = :lastname, firstname = :firstname, email = :email, password = :password, role = :role WHERE user_id = :id");

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    $query->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":password", $password, PDO::PARAM_STR);
    $query->bindValue(":role", $role, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_INT);

    return $query->execute();
}