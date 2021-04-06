<?php
session_start();
// Destruye todas las variables de la sesion
session_unset();
// Finalmente, destruye la sesion
session_destroy();
// Borramos cookies
setcookie('logged-id',NULL,time()-3600,'/');

header('Location: ../login/');