<?php
    session_start();
    session_destroy();
    header("Location: ../Games_Pagina.php");
?>