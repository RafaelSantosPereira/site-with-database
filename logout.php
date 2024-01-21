<?php
session_start();

// junta todas as variáveis de sessão num array para as destruir
$_SESSION = array();

// apaga os cookies de sessão.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();


header("Location: user.html");

exit;
?>