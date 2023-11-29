<?php
    session_start();
    unset($_SESSION["authentication"]);
    unset($_SESSION["auth_user"]);

    
    header("Location: ./"); // index.php")
    exit(0);
?>
