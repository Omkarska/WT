<?php
    session_start();
    $username = $_SESSION['username'];
    checkAndUpdateSessions();
    echo "<center><h2>Welcome! $username this session is active.<br></h2></center>";
    echo "<center><h2>Session Counter: ".$_SESSION['session_counter']."<br></h2></center>";

    function checkAndUpdateSessions() {
        $maxSessions = 3;
    
        if (!isset($_SESSION['session_counter'])) {
            $_SESSION['session_counter'] = 0;
        }
    
        if ($_SESSION['session_counter'] >= $maxSessions) {
            echo "<center><h2>Maximum number of sessions reached. Please try again later.<br></h2></center>";
            ?>
            <center><button style="font-size: 16px; background-color: #f44336; text-decoration: none; padding: 15px 32px;"><a href="logout.php">Logout</a></button><center><?php
            exit();
        }
    
        $_SESSION['session_counter']++;
    }
?>