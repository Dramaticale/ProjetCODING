<?php 

session_start();

if (!isset($_POST['answer']) || empty($_POST['answer'])) {
    $_SESSION['errorAnswer'] = 'Vous ne pouvez pas envoyer une réponse vide';
    header('Location: ./sujet.php?section=' . $_SESSION['section'] . '&sujet=' . $_SESSION['slug']);
    exit;
}