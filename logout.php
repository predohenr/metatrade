<?php
    
    function sair(){
        session_start();
        session_destroy();
        unset($_SESSION['email']);
        $_SESSION['email'] = null;
        header('location: login.html');
        session_commit();
    }

if (isset($_GET['logout'])) {
    sair();
}

?>