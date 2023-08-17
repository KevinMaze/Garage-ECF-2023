<?php

require_once ('lib/config.php');
require_once ('lib/session.php');

// déconnection
session_destroy();
unset($_SESSION);
header("location: connection.php");