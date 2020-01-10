<?php

session_start();

$strlen_title = strlen($_POST['topic-title']);

if (!isset($_POST['topic-title']) || empty($_POST['topic-title']) || !isset($_POST['creation-answer']) || empty($_POST['creation-answer'])) {
    $_SESSION['error-creation-topic'] = "Au moins l'un des champs n'est pas rempli";
    header('Location: ./section.php?section=' . $_SESSION['section']);
    exit;
}

if ($strlen_title > 128) {
    $_SESSION['error-creation-topic'] = "Au moins l'un des champs n'est pas rempli";
    header('Location: ./section.php?section=' . $_SESSION['section']);
    exit;
}