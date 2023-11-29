<?php

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username = "admin" and $password = "admin"){
            session_start();
            $_SESSION['username'] = $username;
            header("Location: home.php");
        }
        else{
            echo "Wrong username and password";
        }
    }

?>