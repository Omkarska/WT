<?php
session_start();

function checkAndUpdateSessions() {
    $maxSessions = 3;

    if (!isset($_SESSION['session_counter'])) {
        $_SESSION['session_counter'] = 0;
    }

    if ($_SESSION['session_counter'] >= $maxSessions) {
        echo "Maximum number of sessions reached. Please try again later.";
        exit();
    }

    $_SESSION['session_counter']++;
}

checkAndUpdateSessions();
echo "Welcome! Your session is active.";
?>
