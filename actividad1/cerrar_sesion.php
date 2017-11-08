<?php
session_start();
unset($_SESSION['tipo'], $_SESSION['pass'], $_SESSION['usuario'], $_SESSION['estado']);
session_destroy();
header('Location: http://mod-01.esy.es/muestra/index.php');
?>