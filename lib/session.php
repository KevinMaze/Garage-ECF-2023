<?php
// paramètre de session (cookie)
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true
]);

// création session utilisateur après connection
try {
    session_start();
} catch (Exception $e) {

    echo $e->getMessage();

}

