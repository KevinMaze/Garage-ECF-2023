<?php

// paramètre de session (cookie)
session_set_cookie_params([
    'lifetime' => 7200,
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true
]);


// création session utilisateur après connection
session_start(); 