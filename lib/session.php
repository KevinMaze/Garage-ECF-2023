<?php
// création session utilisateur après connection
try {
    // paramètre de session (cookie)
    session_set_cookie_params([
        'lifetime' => 3600,
        'path' => '/',
        'domain' => '.ecf-garage-2023-3c29043c899b.herokuapp.com',
        'secure' => true,
        'httponly' => true
    ]);

    session_start();
    
} catch (Exception $e) {

    echo $e->getMessage();

}

?>

