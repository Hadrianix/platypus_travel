<?php 
    session_start();

    unset($_SESSION['logged_in']);
    header("Location: http://localhost/never-miss-a-beat-travel/index.php");

?>