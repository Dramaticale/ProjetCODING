<?php
    session_start();
    unset($_SESSION['check']);
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
?>