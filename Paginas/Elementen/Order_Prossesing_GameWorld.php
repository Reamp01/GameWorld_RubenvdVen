<?php
    session_start();
    if(!isset($_SESSION['Basket']))
    {
        $_SESSION['Basket'] = array();
    }
    array_push($_SESSION['Basket'], $_POST['game_id']);
    header("Location: ../Games_Pagina.php");
?>