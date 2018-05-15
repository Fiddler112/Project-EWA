<?php
    session_start();
    unset($_SESSION["login"]);
    session_destroy();
    echo "<script> alert('You've been logged off')"; // Werkt niet?
    header("Location: login.php");
?>