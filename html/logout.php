<?php
    session_start();

    if(isset($_SESSION["user_email"])){
        session_destroy();
    }

    echo "<script>alert('Logged out.')</script>";
    echo "<script>location.href='index.html'</script>";
    
?>