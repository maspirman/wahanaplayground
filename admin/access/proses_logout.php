<?php
session_start();
require_once '../apl/config/xhelper.php';


unset($_SESSION['login']);
unset($_SESSION['id']);
unset($_SESSION['verify']);
session_destroy();
header('Location: ' . BASE_URL . 'login.php');
